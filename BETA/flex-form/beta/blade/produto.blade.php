@extends(engine_view('base'))
@section('conteudo')
@section('title', $produto->identification->name)
<section class="categoria">
    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="fade">
                <div class="slider-product">
                    @foreach ($produto->images as $image)
                        <div class="helper">
                            <img src="{{thumb($image->source)}}" alt="{{ $produto->identification->name }}" class="img-fluid">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-5" data-aos="fade" data-aos-delay="300">
                <h2 class="produto-title">
                    {{ $produto->identification->name }}
                </h2>
                @if($produto->extraFields->has('breve_descricao'))
                <p class="produto-desc">
                    {{ $produto->extraFields->get('breve_descricao')->values->first()->value }}
                </p>
                @endif
                <hr>
                <div class="cores">
                    <small>cores diponíveis</small>
                    <ul>
                        <li style="background-image: url({{ path('color.png') }})"></li>
                        <li style="background-image: url({{ path('color.png') }})"></li>
                        <li style="background-image: url({{ path('color.png') }})"></li>
                        <li style="background-image: url({{ path('color.png') }})"></li>
                        <li style="background-image: url({{ path('color.png') }})"></li>
                        <li style="background-image: url({{ path('color.png') }})"></li>
                        <li style="background-image: url({{ path('color.png') }})"></li>
                        <li style="background-image: url({{ path('color.png') }})"></li>
                        <li style="background-image: url({{ path('color.png') }})"></li>
                    </ul>
                </div>
                <p class="produto-preco">
                    R$ {{ number_format($produto->prices->first()->price, 2, ',', '.') }}
                </p>
                <hr>
                <div class="row justify-content-between px-3">
                    <div class="qtd">
                        <p>quantidade</p>
                        <i class="fas fa-chevron-down"></i>
                        <input type="text" value="1">
                        <i class="fas fa-chevron-up"></i>
                    </div>
                    <a href="" class="btn-comprar"><span class="cart"></span>adicionar ao carrinho</a>
                </div>
                
                
            </div>
        </div>
        <p class="details" data-aos="fade-in">detalhes do produto</p>
        <div class="row justify-content-between">
            @if($produto->extraFields->has('descricao'))
                <div class="col-md-5 produto-detalhes" data-aos="fade">
                    <p>
                    {!! $produto->extraFields->get('descricao')->values->first()->value !!}
                    </p>
                </div>
            @endif
            @if($produto->extraFields->has('imagem_medidas'))
            <div class="col-md-5" data-aos="fade" data-aos-delay="300">
                <img class="img-fluid" src="{{ $produto->extraFields->get('imagem_medidas')->values->first()->source }}" data-aos="fade">
            </div>
            @endif
        </div>
        @if($produto->extraFields->has('produtos_relacionados'))
        <p class="details" data-aos="fade">
            produtos relacionados
        </p>
        <div class="flex relacionados" data-aos="fade">
            @foreach ($produto->extraFields->get('produtos_relacionados')->values as $item)
                <article class="produto">
                    <a href="{{ $item->record->urls->first()->url }}">
                        <div class="produto__img">
                            <img src="{{ $item->record->main_image->source }}">
                        </div>
                    </a>
                    <a href="{{ $item->record->urls->first()->url }}" class="produto__title">{{ $item->record->identification->first()->name }}</a>
                    <!-- <p class="produto_sub">Baldanzi & Novelli</p> -->
                    <p class="produto__price">R$ {{number_format($item->record->prices->first()->price, 2, ',', '.')}}</p>
                </article>
            @endforeach
        </div>
        @endif
    </div>
</section>
@endsection