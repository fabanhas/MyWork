@extends(engine_view('base'))
@section('conteudo')
@section('title', 'Home')
<main>
  <section class="banners owl-carousel">
    @foreach($banners->collection as $banner)
    <article>
      <a href="{{ $banner->redirect_to }}"><img src="{{ thumb($banner->source, 1920, 440) }}" alt="{{ $banner->alt }}"></a>
    </article>
    @endforeach
  </section>
  <section class="chamadas">
    @foreach($chamadas->collection as $chamada)
    <article class="chamada">
      <a href="{{ $chamada->redirect_to }}"><img src="{{ thumb($chamada->source, 570, 270) }}" alt="{{ $chamada->alt }}"></a>
    </article>
    @endforeach
  </section>
  <section class="conheca-categorias">
    <h2 class="head">Conheça nossas <br> <span>categorias de produtos</span></h2>
    <div class="wrap owl-carousel">
      @foreach($categorias->collection as $categoria)
        @foreach($categoria->children as $child)
          <a href="{{ $child->urls->first() ? $child->urls->first()->url : '' }}" class="categoria" style="background-image: url({{ $child->extraFields->has('imagem_categoria') ? thumb($child->extraFields->get('imagem_categoria')->values->first()->source, 270, 254) : path('placehold.png') }})">
            <span>{{ $child->name }}</span>
          </a>
        @endforeach
      @endforeach
    </div>
    <div class="wrap flex">
      <a href="/produtos" class="lista-completa">Veja a lista completa de produtos</a>
    </div>
  </section>
  @if($maisVendidos->collection->count() > 0 || $ofertas->collection->count() > 0)
  <section class="mais-produtos">
    <div class="wrap">
      @if($maisVendidos->collection->count() > 0)
      <input id="mais-vendidos" type="radio" name="tabs" checked>
      <label for="mais-vendidos">Mais Vendidos</label>
      @endif
      @if($ofertas->collection->count() > 0)
      <input id="ofertas" type="radio" name="tabs">
      <label for="ofertas">Ofertas</label>
      @endif

      @if($maisVendidos->collection->count() > 0)
      <section id="mais-vendidos--content">
        <div class="wrap owl-carousel">
          @foreach($maisVendidos->collection as $item)
            @include(engine_view('item'))
          @endforeach
        </div>
      </section>
      @endif
      @if($ofertas->collection->count() > 0)
      <section id="ofertas--content">
        <div class="wrap owl-carousel">
          @foreach($ofertas->collection as $item)
            @include(engine_view('item'))
          @endforeach
        </div>
      </section>
      @endif
    </div>
  </section>
  @endif
  <a href="/" class="acompanhe-blog"></a>
  <section class="newsletter">
    <div class="wrap">
      <div>
        <p>Assine nossa</p>
        <strong>Newsletter</strong>
        <span>Receba nossas novidades e promoções por e-mail</span>
      </div>
      <div>
        <form id="form-newsletter" form-newsletter="">
          <input class="name" obrigatorio="true" type="text" placeholder="Digite seu nome" name="cadastro[nome]">
          <input class="email" input-email="true" type="text" placeholder="Digite seu e-mail" name="cadastro[email]">
          <input type="submit" value="Enviar">
        </form>
      </div>
    </div>
    @push('afterPageScripts')
    <script>
      $(document).ready(function() {
        $('#form-newsletter').submit(function(e) {
          e.preventDefault();
          StoreNewsletterEmail.store(
            $('#form-newsletter').find('input.email').val(),
            $('#form-newsletter').find('input.name').val()
          );
        });
        CanopusEventCenter.addListener('NewsletterEmail.Stored', function (data) {
          if(data){
            $('#form-newsletter').find('input.email').val(''),
            $('#form-newsletter').find('input.name').val('')
          }
        });
      })
    </script>
    @endpush
  </section>
  <section class="depoiments">
    <h2 class="head">Leia <br><span>nossos depoimentos</span></h2>
    <div class="wrap owl-carousel">
      @foreach($depoimentos->records as $depoimento)
      <article class="depoiment">
        @if($depoimento->descricao)
        <p>{{ $depoimento->descricao->values->first()->value }}</p>
        @endif
        <div class="depoiment--author">
          <i class="user__icon gray"></i>
          <div>
            @if($depoimento->autor)
            <p>{{ $depoimento->autor->values->first()->value }}</p>
            @endif
            @if($depoimento->empresa)
            <strong>{{ $depoimento->empresa->values->first()->value }}</strong>
            @endif
          </div>
        </div>
      </article>
      @endforeach
    </div>
  </section>
  <section class="clientes">
    <h2 class="head">Conheça <br><span>nossos clientes</span></h2>
    <div class="wrap owl-carousel">
      @foreach($clientes->records as $cliente)
        @if($cliente->imagem)
          <a href="{{ $cliente->link->values->first()->value }}">
            <article class="cliente" style="background: url('{{ thumb($cliente->imagem->values->first()->source, 170, 115) }}') center/cover no-repeat"></article>
          </a>
        @endif
      @endforeach
    </div>
  </section>
</main>
@push('afterPageScripts')
<script>
  $(document).ready(function() {
    $('.banners').owlCarousel({
      items: 1,
      dots: false,
      nav: false,
      autoplay: true,
      autplayTimeout: 3000
    })
    $('.conheca-categorias .owl-carousel, .mais-produtos .owl-carousel').owlCarousel({
      items: 4,
      loop: true,
      dots: false,
      autoplay: 1,
      autoplayTimeout: 3000,
      responsive: {
        0: {
          items: 1
        },
        480: {
          items: 2,
          margin: 10
        },
        768: {
          items: 3,
          margin: 10
        },
        1170: {
          items: 4,
          nav: true,
          navText: ['<i class="chevron-left"></i>', '<i class="chevron-right"></i>'],
          margin: 20
        }
      }
    })

    $('.depoiments .owl-carousel').owlCarousel({
      items: 3,
      loop: true,
      autoplay: 1,
      autoplayTimeout: 4000,
      responsive: {
        0: {
          items: 1,
          center: true
        },
        600: {
          items: 2,
          margin: 15
        },
        1170: {
          items: 3,
          nav: true,
          navText: ['<i class="chevron-left"></i>', '<i class="chevron-right"></i>'],
          margin: 32,
        }
      }
    })

    $('.clientes .owl-carousel').owlCarousel({
      items: 6,
      loop: true,
      autoplay: 1,
      autoplayTimeout: 2000,
      responsive: {
        0: {
          items: 1
        },
        480: {
          items: 2,
          margin: 10
        },
        768: {
          items: 4
        },
        991: {
          items: 5
        },
        1170: {
          items: 6,
          nav: true,
          navText: ['<i class="chevron-left"></i>', '<i class="chevron-right"></i>'],
          margin: 30
        }
      }
    })
  })
</script>
@endpush
@endsection