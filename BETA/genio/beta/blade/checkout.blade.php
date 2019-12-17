@checkoutHeader()

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  {{-- <link rel="icon" type="image/png" sizes="32x32" href="{{ path('favicon.png') }}"> --}}
  <title>Meu carrinho - Gênio na caixa</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link href="{{asset('css/canopus/canopus.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ stylesheet('beta.css') }}">
</head>
<body>
  <header class="checkout text-center">
    <a href="/"><img src="{{ path('logo-genionacaixa.png') }}" srcset="{{ path('logo-genionacaixa-2x.png') }} 2x" class="logo" alt="Genio na Caixa"></a>
    <h1 class="text-center">MEU CARRINHO</h1>
  </header>
  <section class="container text-center checkout">
    @checkoutBody()
  </section>

  <footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="{{ canopus_js() }}"></script>
  </footer>
</body>