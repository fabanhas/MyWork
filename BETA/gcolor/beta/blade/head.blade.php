@section('head')
<head>
  @if(starts_with(request()->path(), 'checkout'))
    @checkoutHeader()
  @endif
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  @stack('seo')
  {{-- <link rel="icon" type="image/png" sizes="32x32" href="{{ path('favicon.png') }}"> --}}
  <title>@yield('title') - Gcolor</title>

  <link href="{{asset('css/canopus/canopus.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ stylesheet('beta.css') }}">
  <link rel="stylesheet" href="{{ stylesheet('main.css') }}">
  <link rel="stylesheet" href="{{ stylesheet('media.css') }}">
  <link rel="stylesheet" href="{{ stylesheet('svg.css') }}">
  @stack('styles')

  @if(starts_with(request()->path(), 'checkout'))
  <link rel="stylesheet" href="{{ stylesheet('checkout.css') }}">
  @endif

  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '132350280704520',
        cookie     : true,
        xfbml      : true,
        version    : 'v3.2'
      });
      FB.AppEvents.logPageView();
    };
  
    (function(d, s, id){
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
</head>
@show   