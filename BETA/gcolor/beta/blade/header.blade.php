@section('header')
@include(engine_view('head'))
<body>

  @notmobile
  <header class="header">
    <div class="top">
      <div class="wrap">
        <div class="login">
          <a class="nao-logado" href="javascript:;" canopus-open-identification-modal>Minha conta</a>
          <a class="logado" href="/account/profile">Minha conta</a>
          <span> | </span>
          <a class="nao-logado" href="javascript:;">Cadastre-se</a>
          <a class="logado" href="javascript:;" canopus-logout>Sair</a>
        </div>
        <div class="horario-atendimento">
          @if($gcolor->records->first()->horario_atendimento)
          <p><strong>Horário de atendimento: </strong>{{ $gcolor->records->first()->horario_atendimento->values->first()->value }}</p>
          @endif
        </div>
        <div class="email">
          @if($gcolor->records->first()->e_mail)
          <i class="email__icon"></i>
          <a href="mailto:{{ $gcolor->records->first()->e_mail->values->first()->value }}">{{ $gcolor->records->first()->e_mail->values->first()->value }}</a>
          @endif
        </div>
      </div>
    </div>
    <div class="mid">
      <div class="wrap flex">
        <div class="logo">
          <a href="/"><i class="gcolor__icon"></i></a>
        </div>
        <div class="right @if(starts_with(request()->path(), 'checkout')) checkout @endif">
          <div class="flex">
            <ul class="telefones">
              <li><i class="phone__icon"></i></li>
              @if($gcolor->records->first()->telefone_01)
              <li>
                @if($gcolor->records->first()->cidade_01)
                <p>{{ $gcolor->records->first()->cidade_01->values->first()->value }}</p>
                @endif
                <a href="tel:{{ preg_replace('/[^0-9]+/', '', $gcolor->records->first()->telefone_01->values->first()->value) }}">{{ $gcolor->records->first()->telefone_01->values->first()->value }}</a>
              </li>
              @endif
              @if($gcolor->records->first()->telefone_02)
              <li>
                @if($gcolor->records->first()->cidade_02)
                <p>{{ $gcolor->records->first()->cidade_02->values->first()->value }}</p>
                @endif
                <a href="tel:{{ preg_replace('/[^0-9]+/', '', $gcolor->records->first()->telefone_02->values->first()->value) }}">{{ $gcolor->records->first()->telefone_02->values->first()->value }}</a>
              </li>
              @endif
              @if($gcolor->records->first()->telefone_03)
              <li>
                @if($gcolor->records->first()->cidade_03)
                <p>{{ $gcolor->records->first()->cidade_03->values->first()->value }}</p>
                @endif
                <a href="tel:{{ preg_replace('/[^0-9]+/', '', $gcolor->records->first()->telefone_03->values->first()->value) }}">{{ $gcolor->records->first()->telefone_03->values->first()->value }}</a>
              </li>
              @endif
            </ul>
            <div class="whats">
              @if($gcolor->records->first()->whatsapp)
              <div>
                <i class="whats__icon"></i>
              </div>
              <div>
                <p>WhatsApp</p>
                <a href="https://api.whatsapp.com/send?phone={{ preg_replace('/[^0-9]+/', '', $gcolor->records->first()->whatsapp->values->first()->value) }}">{{ $gcolor->records->first()->whatsapp->values->first()->value }}</a>
              </div>
              @endif
            </div>
            <ul class="perfil">
              <li class="logado">
                <i class="user__icon"></i>
                <a href="/account/profile">Minha Conta</a>
              </li>
              <li class="nao-logado">
                <i class="user__icon"></i>
                <a href="javascript:;" canopus-open-identification-modal>Login / Cadastre-se</a>
              </li>
              <li class="logado">
                <i class="orders__icon"></i>
                <a href="/account/orders">Meus Pedidos</a>
              </li>
            </ul>
          </div>
          @if(!starts_with(request()->path(), 'checkout'))
          <div class="flex">
            <form action="/busca" method="GET" class="search">
              <input type="hidden" name="from" value="0">
              <input type="hidden" name="size" value="24">
              <input type="text" 
                     placeholder="Qual produto você deseja?" 
                     name="term">
              <label for="pesquisar"><i class="search__icon"></i></label>
              <input type="submit" id="busca" value="">
            </form>
            <div class="cart">
              <a href="/checkout"><i class="cart__icon"></i><span class="total">R$ 0,00</span></a>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
    @if(!starts_with(request()->path(), 'checkout'))
    <div class="bottom">
      <ul class="wrap flex">
        <li class="item"><a href="/"><i class="home__icon"></i> Home</a></li>
        <li class="item has-submenu">
          <a href="/produtos"><i class="products__icon"></i> Todos os Produtos</a>

          @if($categorias->collection->count() > 0)
            <div class="submenu">
              <div class="wrap">
                @foreach($categorias->collection as $categoria)
                  @if($categoria->id == 1)
                    @foreach($categoria->children as $child)
                      <a href="/{{ $child->urls ? $child->urls->first()->url : '' }}">{{ $child->name }}</a>
                    @endforeach
                  @endif
                @endforeach
              </div>
            </div>
          @endif
        </li>
        <li class="item">
          <a href="/modelos"><i class="models__icon"></i> Modelos</a>
        </li>
        <li class="item"><a href="/perguntas-frequentes"><i class="faq__icon"></i> FAQ</a></li>
        <li class="item"><a href="/fale-conosco"><i class="contact__icon"></i> Contato</a></li>
        <li class="item personalizado"><a href="/orcamento-personalizado"><i class="budget__icon"></i> Orçamento Personalizado</a></li>
      </ul>
    </div>
    @endif
  </header>
  @endnotmobile
  @mobile
  <header class="header-mobile">
    <div class="hamb-icon"><span></span></div>
    <a href="/"><i class="gcolor__icon"></i></a>
    <nav class="menu-mobile">
      <div class="infos">
        <form class="search" action="#">
          <input type="text" placeholder="Qual produto você deseja?" name="term">
          <label for="pesquisar"><i class="search__icon"></i></label>
          <input type="submit" name="pesquisar" value="">
        </form>
        <div class="telefones flex">
          <div><i class="phone__icon"></i></div>
          <table cellspacing="0" cellpadding="0">
            @if($gcolor->records->first()->telefone_01)
            <tr>
              @if($gcolor->records->first()->cidade_01)
              <td>{{ $gcolor->records->first()->cidade_01->values->first()->value }}</td>
              @endif
              <td><a href="tel:{{ preg_replace('/[^0-9]+/', '', $gcolor->records->first()->telefone_01->values->first()->value) }}">{{ $gcolor->records->first()->telefone_01->values->first()->value }}</a></td>
            </tr>
            @endif
            @if($gcolor->records->first()->telefone_02)
            <tr>
              @if($gcolor->records->first()->cidade_02)
              <td>{{ $gcolor->records->first()->cidade_02->values->first()->value }}</td>
              @endif
              <td><a href="tel:{{ preg_replace('/[^0-9]+/', '', $gcolor->records->first()->telefone_02->values->first()->value) }}">{{ $gcolor->records->first()->telefone_02->values->first()->value }}</a></td>
            </tr>
            @endif
            @if($gcolor->records->first()->telefone_03)
            <tr>
              @if($gcolor->records->first()->cidade_03)
              <td>{{ $gcolor->records->first()->cidade_03->values->first()->value }}</td>
              @endif
              <td><a href="tel:{{ preg_replace('/[^0-9]+/', '', $gcolor->records->first()->telefone_03->values->first()->value) }}">{{ $gcolor->records->first()->telefone_03->values->first()->value }}</a></td>
            </tr>
            @endif
            @if($gcolor->records->first()->whatsapp)
            <tr>
              @if($gcolor->records->first()->whatsapp)
              <td>{{ $gcolor->records->first()->whatsapp->values->first()->value }}</td>
              @endif
              <td><a href="https://api.whatsapp.com/send?phone={{ preg_replace('/[^0-9]+/', '', $gcolor->records->first()->whatsapp->values->first()->value) }}">{{ $gcolor->records->first()->whatsapp->values->first()->value }}</a></td>
            </tr>
            @endif
          </table>
        </div>
        <div class="admin">
          <a class="nao-logado" href="javascript:;" canopus-open-identification-modal><i class="user__icon"></i> Login / Cadastre-se</a>
          <a class="logado" href="/account/profile"><i class="user__icon"></i> Minha Conta</a>
          <a class="logado" href="javascript:;" canopus-logout><i class="user__icon"></i> Sair</a>
          <a href="mailto:{{ $gcolor->records->first()->e_mail->values->first()->value }}"><i class="email__icon"></i> {{ $gcolor->records->first()->e_mail->values->first()->value }}</a>
        </div>
      </div>
      <ul class="menu">
        <li><div><i class="home__icon"></i></div><a href="/">Home</a></li>
        <li class="has-submenu">
          <div><i class="products__icon"></i></div>
          <a href="/produtos">Todos os Produtos</a>

          @if($categorias->collection->count() > 0)
            <div class="submenu">
              @foreach($categorias->collection as $categoria)
                @if($categoria->id == 1)
                  @foreach($categoria->children as $child)
                    <a href="/{{ $child->urls ? $child->urls->first()->url : '' }}">{{ $child->name }}</a>
                  @endforeach
                @endif
              @endforeach
            </div>
          @endif
        </li>
        <li class="has-submenu"><div><i class="models__icon"></i></div><a href="/modelos">Modelos</a></li>
        <li><div><i class="faq__icon"></i></div><a href="/perguntas-frequentes">FAQ</a></li>
        <li><div><i class="contact__icon"></i></div><a href="/fale-conosco">Contato</a></li>
        <li class="personalizado"><div><i class="budget__icon"></i></div><a href="/orcamento-personalizado">Orçamento Personalizado</a></li>
      </ul>
    </nav>
  </header>
  @endmobile

  @if(starts_with(request()->path(), 'checkout'))
    @checkoutBody()
  @endif

  @push('afterPageScripts')
  <script>
    var itens = $('.submenu a')
    itens.each((index, item) => {
      if( index == 0 ) {
        $(item).addClass('letra')
        $(item).attr('data-letra', $(item).text().charAt(0))
      } else {
        if( $(itens[index - 1]).text().charAt(0) !== $(item).text().charAt(0) ) {
          $(item).addClass('letra')
          $(item).attr('data-letra', $(item).text().charAt(0))
        }
      }
    })
  </script>
  @endpush
@show