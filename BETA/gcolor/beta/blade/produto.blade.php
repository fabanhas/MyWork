@extends(engine_view('base'))
@section('conteudo')
@section('title', $produto->identification->name)
@push('seo')
  @if( $produto->extraFields->has('title') )
    <meta name="keywords" content="{{ $produto->extraFields->get('title')->values->first()->value }}">
  @endif
  @if( $produto->extraFields->has('description') )
    <meta name="description" content="{{ $produto->extraFields->get('description')->values->first()->value }}">
  @endif
  @if( $produto->extraFields->has('keywords') )
    <meta name="keywords" content="{{ $produto->extraFields->get('keywords')->values->first()->value }}">
  @endif
@endpush
<main>
  <h2 class="head breadcrumb">Home / {{ $produto->categories->first()->name }} <br><span>{{ $produto->categories->first()->name }}</span></h2>
  <section class="produto-wrap">
    <section class="produto-img">
      <div class="produto-img--thumbs" data-slider-id="1">
        @foreach ($produto->images as $image)
          <button class="owl-thumb-item"><img src="{{thumb($image->source, 68, 68)}}" name="{{$produto->identification->name}}"></button>
        @endforeach
      </div>
      <div class="produto-img--principal owl-carousel" data-slider-id="1">
        @foreach ($produto->images as $image)
          <img src="{{thumb($image->source, 568, 534)}}" alt="{{$produto->identification->name}}">
        @endforeach
      </div>
    </section>
    <section class="produto-content">
      <h1 class="produto--titulo">{{ $produto->identification->name }}</h1>
      @if($produto->extraFields->has('descricao'))
      <div class="produto--descricao">
        {!! $produto->extraFields->get('descricao')->values->first()->value !!}
      </div>
      @endif
      @if( null !== $produto->model->componentizations )
      <div class="produto--opcionais">
        <div id="acabamentos">
          <h3>Acabamentos opcionais</h3>
          <div>
            <form>
              @foreach($produto->model->componentizations as $group)
                @if($group->group->id == 3 ||
                    $group->group->id == 4 ||
                    $group->group->id == 5 ||
                    $group->group->id == 6)
                  <div data-group="{{ $group->group->id }}">
                    <input id="{{ str_slug($group->group->description) }}" type="checkbox" name="acabamento" value="{{ $group->group->components->first()->id }}">
                    <label for="{{ str_slug($group->group->description) }}">{{ $group->group->description }}</label>

                    @foreach($group->group->components as $key => $component)
                      <p class="acabamento-price{{ $key == 0 ? ' active' : '' }}" 
                        data-val="{{ $component->id }}"
                        data-unity="{{ number_format( $component->price->price, 2, ',', '.') }}"
                        data-qtd-min="{{ number_format( $component->min_quantity, 0, ',', '.') }}"
                        data-qtd-max="{{ number_format( $component->max_quantity, 0, ',', '.') }}">
                        R$ {{ number_format($component->price->price, 2, ',', '.') }}
                      </p>
                    @endforeach
                  </div>
                @endif
              @endforeach
            </form>
          </div>
        </div>
      </div>
      @endif
      <div class="produto--valores">
        @hasDiscount($produto->model)
        @if( null !== $produto->model->variations )
          <p class="valor-antigo">R$ {{ number_format($produto->prices->first()->Originalprice, 2, ',', '.') }}</p>
        @endif
        @endhasDiscount
        @if( null !== $produto->model->variations )
          <p class="valor-atual" 
             data-init="{{ number_format($produto->model->variations->first()->prices->first()->price, 2) }}">R$ {{ number_format($produto->model->variations->first()->prices->first()->price, 2, ',', '.') }}</p>
        @else
          <p class="valor-atual" data-init="{{ number_format($produto->prices->first()->price, 2) }}">R$ {{ number_format($produto->prices->first()->price, 2, ',', '.') }}</p>
        @endif  
        @if($produto->prices->first()->installments->count() > 0)
        <p class="valor-parcelas">até 
          <strong>{{ $produto->prices->first()->installments->last()->getQuantity() }}x</strong> de
          <strong>R$ {{ number_format($produto->prices->first()->installments->last()->getPrice(), 2, ',', '.') }}</strong> sem juros</p>
        @endif
      </div>
      @itemAvailable($produto->model)
      <div class="produto--quantidade">
        @if( null !== $produto->model->variations )
          <strong>Quantidade: </strong>
          <select name="quantidade" id="quantidade">
            @foreach($produto->model->variations as $variation)
              @if($variation->extraFields->has('quantidade_vendida'))
                <option data-price="{{ number_format($variation->prices->first()->price, 2) }}" value="{{ $variation->id }}">{{ $variation->extraFields->get('quantidade_vendida')->values->first()->value }}</option>
              @endif
            @endforeach
          </select>
          <a class="comprar" href="javascript:;" id="{{ $produto->model->variations->first()->id }}" quantity="1">Comprar</a>
        @endif
      </div>
      @enditemAvailable
    </section>
    <section class="produto--infos">
      <div class="produto--share">
        <div class="fb-share-button"
          data-href="https://www.your-domain.com/your-page.html"
          data-layout="button_count">
        </div>
        <a class="twitter-share-button"
          href="https://twitter.com/intent/tweet"
          data-size="small">
        Tweetar</a>
      </div>
      <div>
        @if( $produto->extraFields->has('gabarito') )
          <a href="{{ $produto->extraFields->get('gabarito')->values->first()->source }}" class="produto--download"><i class="chevron-down"></i> Download gabarito</a>
        @endif
      </div>
      <div>
        @if( $produto->extraFields->has('prazo_de_producao') )
          <div class="produto--prazo-producao">
            <i class="prazo__icon"></i> 
            <p>Prazo de produção <strong>{{ $produto->extraFields->get('prazo_de_producao')->values->first()->value }}</strong></p>
          </div>
        @endif
      </div>
      <div id="calcular-frete" class="produto--frete" calcular-frete-produto>
        <i class="frete__icon"></i> 
        <strong>Calcule o frete: </strong> 
        <form action="#">
          <input type="text" name="iptCEP" id="iptCEP" value="" tabindex="1" placeholder="00000-000" data-cep
            data-id-produto="{{ $produto->model->id }}" />
          <input type="submit" value="ok" id="calcular-ftre-btn" calcular-frete>
        </form>
        <div class="container-frete">
          <ul></ul>
        </div>
      </div>
    </section>
    <section class="produto--sobre">
      <div><h2 class="produto--head">Sobre a arte</h2></div>
      <input id="arte-pronta" type="radio" name="tabs">
      <label for="arte-pronta">Já possuo arte pronta</label>
      <div class="produto--sobre-container" id="arte-pronta">
        <div class="produto--sobre-wrap">
          <div>
            <strong>Envie o arquivo da sua arte</strong>
            <div class="upload--files">
              <div class="upload">
                <form enctype="multipart/form-data">
                  <input name="arte" id="arte-pronta1" type="file">
                  <label for="arte-pronta1" data-content="Nenhum arquivo selecionado">Escolher arquivo</label>
                  <i class="fas fa-times"></i>
                </form>
              </div>
              <span class="add-input">+ Adicionar mais imagens</span>
            </div>
          </div>
          <div>
            <strong>Observações</strong>
            <textarea name="observacoes" id="observacoes" cols="30" rows="10"></textarea>
            @if( null !== $produto->model->variations )
              <a class="comprar" href="javascript:;" id="{{ $produto->model->variations->first()->id }}">Comprar</a>
            @else
              <a class="comprar" href="javascript:;" id="{{ $produto->model->id }}">Comprar</a>
            @endif
          </div>
        </div>
      </div>

      <input id="arte-personalizada" type="radio" name="tabs">
      <label for="arte-personalizada">Não possuo a arte, desejo que a Gcolor crie para mim</label>
      <div class="produto--sobre-container" id="arte-personalizada">
        <div class="produto--sobre-wrap">
          <div>
            <strong>Possui alguma imagem que você queira nos enviar?</strong>
            <div class="upload--files">
              <div class="upload">
                <form enctype="multipart/form-data">
                  <input name="arte" id="arte-personalizada1" type="file">
                  <label for="arte-personalizada1" data-content="Nenhum arquivo selecionado">Escolher arquivo</label>
                  <i class="fas fa-times"></i>
                </form>
              </div>
              <span class="add-input">+ Adicionar mais imagens</span>
            </div>
            @if(null !== $produto->model->componentizations)
              @foreach($produto->model->componentizations as $group)
                @if($group->group->id !== 3 &&
                    $group->group->id !== 4 &&
                    $group->group->id !== 5 &&
                    $group->group->id !== 6)
                  <div class="valor-acrescentado" data-id="{{ $group->group->id }}">
                    <strong>Para esta opção será acrescido o valor de:</strong>
                    @foreach($group->group->components as $component)
                      <div class="opcao">
                        <input type="radio" name="valor-acrescentado" id="{{ str_slug( $component->component->identification->first()->name ) }}" value="{{ $component->id }}">
                        <label for="{{ str_slug( $component->component->identification->first()->name ) }}" data-price="{{ number_format($component->price->price, 2, ',', '.') }}">
                          R$ {{ null !== $component->price ? number_format($component->price->price, 2, ',', '.') : false }} - {{ $component->component->identification->first()->name }}
                        </label>
                        {{-- {{ dd( $component->extraFields->has('observacao') ) }} --}}
                        @if( $component->component->extraFields->has('observacao') )
                          <div class="opcao-observacao">
                            <i class="fas fa-question"></i>
                            <span>{{ $component->component->extraFields->get('observacao')->values->first()->value }}</span>
                          </div>
                        @endif
                      </div>
                    @endforeach
                  </div>
                @endif
              @endforeach
            @endif
          </div>
          <div>
            <strong>Observações</strong>
            <textarea name="observacoes" id="observacoes" cols="30" rows="10"></textarea>
            @if( null !== $produto->model->variations )
              <a class="comprar arte-personalizada" href="javascript:;" id="{{ $produto->model->variations->first()->id }}" quantity="1">Comprar</a>
            @else
              <a class="comprar arte-personalizada" href="javascript:;" id="{{ $produto->model->id }}" quantity="1">Comprar</a>
            @endif
          </div>
        </div>
      </div>

      <input id="arte-pronta-gcolor" type="radio" name="tabs">
      <label for="arte-pronta-gcolor">A Gcolor já possui a arte de um pedido anterior</label>
      <div class="produto--sobre-container" id="arte-personalizada">
        <div class="produto--sobre-wrap">
          <div>
            <strong>Observações</strong>
            <textarea name="observacoes" id="observacoes" cols="30" rows="10" placeholder="Informe o número do pedido que deseja repetir"></textarea>
            @if( null !== $produto->model->variations )
              <a class="comprar arte-personalizada" href="javascript:;" id="{{ $produto->model->variations->first()->id }}" quantity="1">Comprar</a>
            @else
              <a class="comprar arte-personalizada" href="javascript:;" id="{{ $produto->model->id }}" quantity="1">Comprar</a>
            @endif
          </div>
        </div>
      </div>

      @push('afterPageScripts')
        <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
        <script src="{{ script('locale-br.js') }}"></script>
        <script src="{{ script('acabamentos.js') }}"></script>
        <script src="{{ script('sobre-arte.js') }}"></script>
        <script>
          $(document).ready(function() {
            $('.add-input').on('click', function() {
              let context = $(this).parent()
              $(this).prev().clone().insertBefore(context.find('.add-input'))
              $(this).parent().find('.upload:last input').attr('id', context.find('.upload:first').find('input').attr('id') + $('.upload').length)
              $(this).parent().find('.upload:last label').attr('for', context.find('.upload:first').find('input').attr('id') + $('.upload').length)
            })

            $('.upload--files').on('click', '.upload .fa-times', function() {
              $(this).parent().parent().remove()
            })

            $('.produto--sobre-wrap, .orcamento--dados').on('change', 'input[type=file]', function(data) {
              $(this).next().attr('data-content', data.target.files[0].name)
            })
          })
        </script>
      @endpush
    </section>
    <section class="produto--geral">
      <div>
        <h2 class="produto--head">Sobre o produto</h2>
      </div>
      @if($produto->extraFields->has('detalhes'))
      <div class="produto--geral-content">
        @if($produto->extraFields->has('imagem_detalhes'))
        <div>
          <img src="{{ $produto->extraFields->get('imagem_detalhes')->values->first()->source }}">
        </div>
        @endif
        <div>
          <p>{!! $produto->extraFields->get('detalhes')->values->first()->value !!}</p>
        </div>
      </div>
      @endif
    </section>
  </section>
</main>
@push('styles')
<link rel="stylesheet" href="{{ stylesheet('jquery-ui-min.css') }}">
@endpush
@push('afterPageScripts')
<script src="{{ script('jquery-mask-min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/owl.carousel2.thumbs@0.1.8/dist/owl.carousel2.thumbs.min.js"></script>
<script src="{{ script('jquery-ui-min.js') }}"></script>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));</script>
<script>
  $(document).ready(function() {
    $('#iptCEP').mask('00000-000')
    $('.produto-img--principal').owlCarousel({
      items: 1,
      loop: true,
      thumbs: true,
      thumbImage: false,
      thumbsPrerendered: true,
      thumbContainerClass: 'produto-img--thumbs'
    })

    $('#calcular-ftre-btn').click(function(e) {
      e.preventDefault();
		  var cep = $('#iptCEP').val().replace('-', '');
		  var qtd = $('#quantidade').find('option:selected').text();
      $.ajax({
        url: "/ecommerce/zip-code-ranges?zip_code=" + cep + "&item_id=" + {{ $produto->model->id }} + "&quantity=" + qtd,
        type: 'GET',
        dataType: 'JSON',
        success: function(result) {
          var html = '';
          $('.container-frete ul').html('');
          $.each(result.data, function(index, shipment) {
            var timecostFrom = shipment.time_cost.split('.').shift();
            if( shipment.time_cost_limit !== null ){
              var timecostUntil = shipment.time_cost_limit.split('.').shift();
              var timecostUntilScape = ' a ' + timecostUntil
            }else{
              var timecostUntilScape = '';
            }
            html = '<li>'
              + '<i class="fa fa-truck" aria-hidden="true"></i>'
              + shipment.description 
              + ': R$ ' 
              + (parseInt(shipment.amount * 100) / 100).toLocaleString()
              + ' - '
              + timecostFrom + timecostUntilScape + ' dias úteis'
              + ' </li>';
            $('.container-frete ul').append(html);
          });
          $('.container-frete').addClass('active')
        }
      });
    });

    $('#acabamentos').accordion({
      collapsible: true,
      heightStyle: "content",
      active: false
    })
  })

</script>
@endpush
@endsection