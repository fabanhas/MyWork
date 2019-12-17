<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | FlexForm</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="{{ stylesheet('bootstrap.css') }}">
    <link rel="stylesheet" href="{{ stylesheet('style.css') }}">
    @if(starts_with(request()->path(), 'checkout'))
    @endif
</head>
<body>
@if(!starts_with(request()->path(), 'checkout'))
    <nav id="mobile-menu">
        <ul>
            @foreach($menu->collection as $cate)
                <li>
                    <a href="{{ $cate->urls->first() ? $cate->urls->first()->url : '' }}" @if(request()->path() == $cate->urls->first()->url) class="active" @endif>{{ $cate->name }}</a>
                </li>
            @endforeach
        </ul>
    </nav>
    <div id="content">
    <header class="flex-menu @if(starts_with(request()->path(), '/')) menu-home @endif" data-aos="fade-left" data-aos-delay="300">
        <div class="container">
            <nav>
                <a href="javascript:;" class="menu-btn">
                    <span></span>
                </a>
                <a href="/" class="logo">
                    @if(starts_with(request()->path(), '/'))
                        <img class="img-fluid" src="{{ path('logo-white.png') }}" alt="">
                    @else
                        <img class="img-fluid" src="{{ path('logo-orange.png') }}" alt="">
                    @endif
                </a>
                <ul class="mobile-menu">
                    @foreach($menu->collection as $cate)
                        <li>
                            <a href="{{ $cate->urls->first() ? $cate->urls->first()->url : '' }}" @if(request()->path() == $cate->urls->first()->url) class="active" @endif>{{ $cate->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <ul class="icons-list">
                    <li>
                        <a data-fancybox data-src="#search" data-touch="false">
                            <span class="search"></span>
                        </a>
                    </li>
                    <li class="nao-logado">
                        <a href="javascript:;" canopus-open-identification-modal>
                            <span class="user"></span>
                        </a>
                    </li>
                    <li class="logado">
                        <a  href="/account">
                            <span class="user"></span>
                        </a>
                    </li>
                    <li>
                        <a href="/checkout">
                            <span class="cart"></span>
                            <span class="qtd-cart">0</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <div id="search" style="display: none">
        @push('scripts')
            <script>
                var headerSearch;
                $(document).ready(function() {
                    headerSearch = new HeaderSearch(new Searcher); 
                });
            </script>
        @endpush
        <form action="/busca" method="GET">
            <input
            placeholder="Pesquise"
            name="term"
            type="text"
            value=""
            onfocusout="$('.search-results').fadeOut();"
            onkeyup="headerSearch.fieldKeyUp(this, $('select[name=category_id]').val());"
            autocomplete="off">
            <input type="hidden" name="from" value="0">
            <input type="hidden" name="size" value="24">
            <label class="search-btn">
                <input type="submit">
            </label>
            <ul class="search-results" style="display:none;"></ul>
        </form>
    </div>
@endif
