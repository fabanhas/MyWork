@section('head')
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  {{-- <link rel="icon" type="image/png" sizes="32x32" href="{{ path('favicon.png') }}"> --}}
  <title>@yield('title') - Gênio na caixa</title>

  <link href="{{asset('css/canopus/canopus.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ stylesheet('beta.css') }}">
  <link rel="stylesheet" href="{{ stylesheet('style.css') }}">
  @stack('styles')

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