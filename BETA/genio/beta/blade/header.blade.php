@section('header')
@include(engine_view('head'))
<body {{ request()->path() !== '/' ? 'class=page' : false }}>

    <header class="bg-purple py-3 py-md-5 text-white position-relative">

      <nav class="navbar navbar-expand-lg mb-md-5">
        <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link mr-md-4" href="{{ request()->path() == '/' ? '#conheca' : '/#conheca' }}">Conheça o Gênio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mr-md-4" href="{{ request()->path() == '/' ? '#planos' : '/#planos' }}">Planos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ request()->path() == '/' ? '#segredo' : '/#segredo' }}">O segredo da caixa</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link mr-md-4" href="/fale-conosco">Fale com o Gênio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mr-md-4 nao-logado" href="javascript:;" canopus-open-identification-modal>Login</a>
                <a class="nav-link mr-md-4 logado login" href="/account/profile"></a>
                {{-- <a class="nav-link mr-md-4 logado" href="javascript:;" canopus-logout>Sair</a> --}}
              </li>
              <li class="nav-item checkout">
                <a class="nav-link text-white" href="/checkout"><i class="fas fa-shopping-cart mr-2"></i> <span class="badge bg-yellow mr-2">0</span> <strong>R$ 0,00</strong></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      @if(request()->path() == '/')
        <div class="container text-center content">
          <a href="/"><img src="{{ path('genio.png') }}" class="logo" alt="Genio na Caixa"></a>

          @if(null !== $clube->records->first()->titulo)
            <h1 class="text-uppercase">{{ $clube->records->first()->titulo->values->first()->value }}</h1>
          @endif
          @if(null !== $clube->records->first()->subtitulo)
            <p class="my-4">{{ $clube->records->first()->subtitulo->values->first()->value }}</p>
          @endif
          <a href="/como-funciona" class="btn btn-yellow rounded-pill px-4 mr-md-3 py-2 mb-3 mb-md-0">Como funciona</a> <a href="#planos" class="btn btn-lightblue rounded-pill px-4 py-2 mb-5 mb-md-0">Conheça nossos planos</a>
        </div>
      @else
        <div class="container text-center content">
          <a href="/"><img src="{{ path('logo-genionacaixa.png') }}" class="logo" alt="Genio na Caixa"></a>
        </div>
      @endif

    </header>
@show