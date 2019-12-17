@section('footer')

    <footer class="py-5 border-top position-relative">
      <a href="/"><img src="{{ path('logo-genionacaixa.png') }}" class="logo-footer position-absolute d-none d-md-block" alt="Genio na Caixa" width="200" href="187"></a>
      <div class="container">

        <div class="row">
          <div class="col-6 col-md-2">
            <strong>Institucional</strong>
            <ul class="mb-3">
              <li><a href="/quem-somos">Quem Somos</a></li>
              <li><a href="/clube-de-assinatura">Clube de Assinatura</a></li>
              <li><a href="/seguranca">Segurança</a></li>
              <li><a href="/politica-de-privacidade">Política de Privacidade</a></li>
            </ul>

            <strong>Serviços</strong>
            <ul>
              <li><a href="/central-de-atendimento">Central de atendimento</a></li>
              <li><a href="/fale-conosco">Fale Conosco</a></li>
            </ul>
          </div>

          <div class="col-6 col-md-2 text-right text-md-left">
            <strong>Dúvidas</strong>
            <ul>
              <li><a href="/account/orders">Meus pedidos</a></li>
              <li><a href="/como-funciona">Como funciona</a></li>
              <li><a href="/termos-e-condicoes">Termos e Condições</a></li>
              <li><a href="/entrega">Entrega</a></li>
              <li><a href="/troca-e-devolucao">Troca e devoluções</a></li>
            </ul>
          </div>

          <div class="col-7 col-md-3 mt-3 mt-md-0">
            <strong>Atendimento</strong>
            @if(null !== $clube->records->first()->telefone)
              <p><a href="tel:{{ preg_replace('/[^\d]+/', '', $clube->records->first()->telefone->values->first()->value) }}">{{ $clube->records->first()->telefone->values->first()->value }}</a> <br />
            @endif
            @if(null !== $clube->records->first()->e_mail)
              <a href="mailto:{{ $clube->records->first()->e_mail->values->first()->value }}">{{ $clube->records->first()->e_mail->values->first()->value }}</a></p>
            @endif
          </div>

          <div class="col-5 col-md-2 mt-3 mt-md-0 text-right text-md-left">
            <strong>Redes Sociais</strong>
            @if(null !== $clube->records->first()->facebook || null !== $clube->records->first()->instagram)
              <p class="mt-2"><a href="{{ $clube->records->first()->facebook->values->first()->value }}" target="_blank"><i class="fab fa-facebook-square fa-2x mr-2"></i></a> <a href="{{ $clube->records->first()->instagram->values->first()->value }}" target="_blank"><i class="fab fa-instagram fa-2x"></i></a></p>
            @endif
          </div>

          <div class="col-6 col-md-2">
            <strong>Formas de Pagamento</strong>
            <p class="mt-2"><img src="{{ path('payments-logos.png') }}" alt="Formas de pagamento" class="img-fluid"></p>
          </div>

          <div class="col-6 col-md-1 text-right">
            <strong>Segurança</strong>
            <p class="mt-2"><img src="{{ path('ssl-logo.png') }}" alt="Segurança" class="img-fluid"></p>
          </div>

        </div>
      </div>

      <div class="mt-5 text-center border-top py-3 hello">
          @if(null !== $clube->records->first()->cnpj)
            <p>CNPJ: {{ $clube->records->first()->cnpj->values->first()->value }}</p>
          @endif
          <p><a href="https://www.betalabs.net" target="_blank"><img src="{{ path('betalabs.png') }}" class="img-fluid mr-3" alt="BetaLabs"></a> <a target="_blank" href="https://www.followupcomunicacao.com.br" target="_blank"><img src="{{ path('fup.png') }}" class="img-fluid"></a></p>
      </div>

    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="{{ canopus_js() }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ script('default.js') }}"></script>
    <script src="{{ script('main.js') }}"></script>
    @stack("scripts")
  </body>
</html>

@stack('afterPageScripts')
@show