@extends(engine_view('base'))
@section('conteudo')
@section('title', 'Promoção da semana')
<main>
  <section class="countdown--wrap">
    <div class="wrap">
      <div>
        <h2>Promoção <br> <strong>da Semana</strong></h2>
      </div>
      <div>
        <div class="countdown">
          <div class="unit day" data-val="Dias">
            <p></p>
          </div>
          <div class="unit hour" data-val="Horas">
            <p></p>
          </div>
          <div class="unit minute" data-val="Minutos">
            <p></p>
          </div>
          <div class="unit second" data-val="Segundos">
            <p></p>
          </div>
        </div>
        <a href="javascript:;" class="countdown--cta">Quero aproveitar!</a>
      </div>
    </div>
  </section>
  <section class="promocao--produto-wrap">
    <div class="promocao--img">
      <img src="">
    </div>
    <div class="promocao--descricao">
      <h1 class="produto--titulo"></h1>
      <div class="produto--valores">
        <p class="valor-antigo"></p>
        <p class="valor-atual"></p>
        {{-- <p class="valor-parcelas">até <strong>3x</strong> de <strong>R$ </strong> sem juros</p> --}}
        <p class="valor-desconto"><i class="boleto__icon"></i> Desconto de <span class="desconto-porcentagem"></span>% no boleto! <strong class="desconto"></strong></p>
      </div>
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
    </div>
  </section>
</main>
@push('afterPageScripts')
<link rel="stylesheet" href="{{ stylesheet('jquery-ui-min.css') }}">
<script src="{{ script('jquery-ui-min.js') }}"></script>
<script src="{{ script('jquery-countdown-min.js') }}"></script>
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
    fetch(window.location.href, {
      headers: {
        'Accept'           : 'application/json',
        'Content-Type'     : 'application/json',
        'X-Requested-With' : 'XMLHttpRequest'
      }
    }).then(response => response.json())
      .then(data => {
        console.log(data)
        let produto = data.produto.collection[0]
        let date = produto.extra_fields.data_termino.values[0].value
        let hasDiscount = paraReal(produto.prices[0].price) == paraReal(produto.prices[0].original_price) ? false : true
        
        $('.promocao--img img').attr('src', produto.main_image.source)
        $('.produto--titulo').text(produto.identification[0].name)
        hasDiscount ? $('.valor-antigo').text('R$ ' + paraReal(produto.prices[0].original_price)) : false
        $('.valor-atual').text('R$ ' + paraReal(produto.prices[0].price))
        if(produto.prices[0].discount_percentage !== 0) {
          $('.desconto-porcentagem').text(produto.prices[0].discount_percentage)
          $('.desconto').text('R$ ' + paraReal(valorBoleto(produto.prices[0].discount_percentage, produto.prices[0].price)))
        } else {
          $('.valor-desconto').hide()
        }
        $('.countdown--cta').attr('href', produto.urls[0].url)

        $('.countdown').countdown(formatDate(date)).on('update.countdown' ,function(e) {
          $('.day p').text(e.strftime("%D"))
          $('.hour p').text(e.strftime("%H"))
          $('.minute p').text(e.strftime("%M"))
          $('.second p').text(e.strftime("%S"))
        })
      })

    let paraReal = value => {
      let num = Number(value).toFixed(2)
      return num.toString().replace('.', ',')
    }

    let valorBoleto = (porcentagem, valor) => valor - ((porcentagem / 100) * valor)
    let formatDate = date => date.replace(/(\d{2})-(\d{2})-(\d{4})/g, '$3/$2/$1')
  })
</script>
@endpush
@endsection