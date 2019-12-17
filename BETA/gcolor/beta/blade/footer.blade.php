@section('footer')
<footer class="footer">
    <div class="wrap flex">
      <div>
        <ul>
          <h2>Institucional</h2>
          <li><a href="/sobre">Sobre nós</a></li>
          <li><a href="/produtos">Produtos</a></li>
          <li><a href="/modelos">Modelos</a></li>
        </ul>
        <ul>
          <h2>Serviços</h2>
          <li><a href="/central-de-atendimento">Central de Atendimento</a></li>
          <li><a href="/orcamento-personalizado">Orçamento Personalizado</a></li>
          <li><a href="fale-conosco">Fale Conosco</a></li>
        </ul>
      </div>
      <div>
        <ul>
          <h2>Dúvidas</h2>
          <li class="logado"><a href="/profile/orders">Meus Pedidos</a></li>
          <li><a href="/como-comprar">Como Comprar</a></li>
          <li><a href="/privacidade">Privacidade</a></li>
          <li><a href="/termos-e-condicoes">Termos e Condições</a></li>
          <li><a href="/entrega">Entrega</a></li>
          <li><a href="/troca-e-devolucao">Troca e Devolução</a></li>
        </ul>
      </div>
      <div class="social">
        <ul>
          <h2>Redes Sociais</h2>
          <li class="canais flex">
            @if($gcolor->records->first()->facebook)
            <a target="_blank" href="{{ $gcolor->records->first()->facebook->values->first()->value }}"><i class="social__icon facebook"></i></a>
            @endif
            @if($gcolor->records->first()->instagram)
            <a target="_blank" href="{{ $gcolor->records->first()->instagram->values->first()->value }}"><i class="social__icon instagram"></i></a>
            @endif
            @if($gcolor->records->first()->twitter)
            <a target="_blank" href="{{ $gcolor->records->first()->twitter->values->first()->value }}"><i class="social__icon twitter"></i></a>
            @endif
          </li>
          @if($gcolor->records->first()->horario_atendimento)
          <li class="horario"><i class="horario__icon"></i> Horário de atendimento: {{ $gcolor->records->first()->horario_atendimento->values->first()->value }}</li>
          @endif
          @if($gcolor->records->first()->e_mail)
          <li class="email"><a href="mailto:{{ $gcolor->records->first()->e_mail->values->first()->value }}"><i class="email__icon white"></i> {{ $gcolor->records->first()->e_mail->values->first()->value }}</a></li>
          @endif
          <li class="telefones">
            <i class="phone__icon white"></i>
            <table cellspacing="0" cellpadding="0">
              @if($gcolor->records->first()->telefone_01)
              <tr>
                <td>{{ $gcolor->records->first()->cidade_01->values->first()->value }}</td>
                <td><a href="tel:{{ preg_replace('/[^0-9]+/', '', $gcolor->records->first()->telefone_01->values->first()->value) }}">{{ $gcolor->records->first()->telefone_01->values->first()->value }}</a></td>
                <td><i class="whats__icon white"></i> WhatsApp <a href="tel:{{ preg_replace('/[^0-9]+/', '', $gcolor->records->first()->whatsapp->values->first()->value) }}">{{ $gcolor->records->first()->whatsapp->values->first()->value }}</a></td>
              </tr>
              @endif
              @if($gcolor->records->first()->telefone_02)
              <tr>
                <td>{{ $gcolor->records->first()->cidade_02->values->first()->value }}</td>
                <td><a href="tel:{{ preg_replace('/[^0-9]+/', '', $gcolor->records->first()->telefone_02->values->first()->value) }}">{{ $gcolor->records->first()->telefone_02->values->first()->value }}</a></td>
              </tr>
              @endif
              @if($gcolor->records->first()->telefone_03)
              <tr>
                <td>{{ $gcolor->records->first()->cidade_03->values->first()->value }}</td>
                <td><a href="tel:{{ preg_replace('/[^0-9]+/', '', $gcolor->records->first()->telefone_03->values->first()->value) }}">{{ $gcolor->records->first()->telefone_03->values->first()->value }}</a></td>
              </tr>
              @endif
            </table>
          </li>
        </ul>
      </div>
      <div>
        <ul>
          <h2>Formas de Pagamento</h2>
          <li><img src="{{ path('bandeiras.png') }}"></li>
        </ul>
      </div>
    </div>
  </footer>
  <section class="made-by">
    <div class="wrap flex">
      <div>
        <a href="/"><i class="gcolor__icon"></i></a>
        <div>
          <p>CNPJ {{ $gcolor->records->first()->cnpj->values->first()->value }}</p>
          <p>{{ $gcolor->records->first()->endereco->values->first()->value }}</p>
        </div>
      </div>
      <div>
        <a target="_blank" href="https://betalabs.com.br"><img src="{{ path('beta.png') }}" alt="Betalabs"></a>
        <a target="_blank" href="https://followupcomunicacao.com.br"><img src="{{ path('fup.png') }}" alt="Follow UP Comunicação"></a>
      </div>
    </div>
  </section>

  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="{{asset('js/canopus/canopus.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="{{ script('main.js') }}"></script>
</body>
</html>

@stack('afterPageScripts')
@show