@if(!request()->ajax())
    @extends(engine_view('base'))
    @section('conteudo')
    @section('title', $category->model->name)
    <section class="categoria">
        <div class="container">
            <div class="flex">
                <aside class="menu__categorias" id="filters" data-aos="fade-in" >
                    <ul data-selectable="true">
                        <h2 >Linhas</h2>
                        <div class="collapse-div">
                            @foreach($linhas->collection as $cat)
                                <li  @if(request()->path() == $cat->urls->first()->url) class="active" @endif>
                                    <a href="{{ $cat->urls->first() ? $cat->urls->first()->url : '' }}">
                                    <input type="checkbox"/>
                                    <label for="formatos0"></label>
                                    {{ $cat->name }}
                                    </a>
                                </li> 
                            @endforeach
                        </div>
                    </ul>
                    @foreach($category->extraFields as $cor)
                        @if($cor->slug == 'cor')
                            <ul data-selectable="true">
                                <h2 >Cores</h2>
                                <div class="collapse-div">
                                    @foreach($cor->values as $value)
                                        <li class="active">
                                            <a class="in" data="{{ $value->value }}">
                                            <input type="checkbox"/>
                                            <label for="formatos0"></label>
                                            {{ $value->value }}
                                            </a>
                                        </li> 
                                    @endforeach
                                </div>
                            </ul>
                        @endif
                    @endforeach
                </aside>

            <section class="vitrine interna">
                <section class="filtros">
                    <div class="filtros-mobile" data-fancybox data-src="#filters" data-touch="false">
                      filtrar
                    </div>
                  <div class="left">
                    <div class="ordenar">
                      <select name="ordenar" id="ordenar" canopus-showcase-infinite-scroll-sort>
                        <option value=""
                            @if(request('_sort', '') === '')
                            selected
                            @endif>Ordenar Por</option>
                        <option value="-id"
                            @if(request('_sort', '') === '-id')
                            selected
                            @endif>Lançamentos</option>
                        <option value="price"
                            @if(request('_sort', '') === 'price')
                            selected
                            @endif>Menor Preço</option>
                        <option value="-price"
                            @if(request('_sort', '') === '-price')
                            selected
                        @endif>Maior Preço</option>
                      </select>
                      <span>+</span>
                    </div>
                  </div>
                  
                </section>


                <div class="flex" canopus-showcase-infinite-scroll>
@endif
                        @foreach($category->collection as $item)
                            @include(engine_view('produto-item'))
                        @endforeach  
@if(!request()->ajax())
                </div>
                    @if($category->collection->isNotEmpty() && $category->collection->count() >= 24)
                        <button class="btn-mostrar-mais" canopus-showcase-infinite-scroll-more>Carregar mais</button>
                    @endif
              </section>
            </div>
        </div>
    </section>
    @endsection
@endif