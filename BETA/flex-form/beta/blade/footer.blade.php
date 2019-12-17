@section('footer')
    @if(!starts_with(request()->path(), 'checkout'))
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <p class="title">Institucional</p>
                        <a href="/quem-somos">Quem Somos</a>            
                        <a href="/seguranca">Segurança</a>
                        <p class="title">Serviços</p>
                        <a href="/central-de-atendimento">Central de Atendimento</a>
                        <a href="/contato">Fale Conosco</a>
                    </div>
                    <div class="col-lg-2">
                        <p class="title">Dúvidas</p>
                        <a class="logado" href="/account/orders">Meus Pedidos</a>
                        <a href="/como-comprar">Como Comprar</a>
                        <a href="/termos-e-condicoes">Termos e Condições</a>
                        <a href="/entrega">Entrega</a>
                        <a href="/troca-e-devolucao">Troca e devolução</a>
                    </div>
                    <div class="col-lg-2">
                        <p class="title">Atendimento</p>
                        <p>Av. Papa João Paulo 1, 1.849</p>
                        <p>Guarulhos - SP</p>
                        <p>CEP: 07170-350</p>
                        <p class="phone">+55 11 2431-5511</a>
                    </div>
                    <div class="col-lg-2">
                        <p class="title">Redes Sociais</p>
                        <div class="row">
                            <div class="col">
                                <a href="" class="social-link">
                                    <img class="img-fluid" src="{{ path('face.png') }}" alt="">
                                </a>
                                <a href="" class="social-link">
                                    <img class="img-fluid" src="{{ path('insta.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6">
                        <p class="title">Formas de Pagamento</p>
                        <img src="{{ path('pagamento.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-lg-2 col-6">
                        <p class="title">Segurança</p>
                        <img src="{{ path('ssl.png') }}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <img class="img-fluid" src="{{ path('logo-orange.png') }}" alt="">
                    </div>
                    <div class="col-md-3">
                        <p>CNPJ: 00.000.000/0001-00</p>
                    </div>
                    <div class="ml-md-auto col-md-2 col-6">
                        <a href="https://betalabs.com.br" target="_blank" rel="noopener">
                            <img src="{{ path('beta.png') }}" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-md-1 col-6">
                        <a href="https://followupcomunicacao.com.br" target="_blank" rel="noopener">
                            <img src="{{ path('fup.png') }}" alt="" class="img-fluid">
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    @endif
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{ canopus_js() }}"></script>
<script src="{{ script('theme.js') }}"></script>
<script>
  AOS.init();
</script>
@stack('scripts')
@show