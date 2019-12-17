@extends(engine_view('base'))
@section('conteudo')
@section('title', 'Home')
<section class="banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 data-aos="fade">caderias <br>e poltronas</h2>
                <p data-aos="fade" data-aos-delay="400">com qualidade e portfólio completo, para áreas operativas, executivas, colaborativas, auditórios e para ambientes de coletividade</p>
            </div>
        </div>
    </div>
</section>
<section class="navegue">
    <div class="container">
        <div class="right-nav" data-aos="fade">
            <p>navegue por categorias</p>
        </div>
        <div class="slider-home" data-aos="fade">
            <div class="helper">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ path('cadeira.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-5" data-aos="fade" data-aos-delay="300">
                        <h2>office chairs</h2>
                        <p>cadeiras operativas pensadas e desenvolvidas para serem aliadas da alta produtividade e do conforto nos ambientes corporativos.</p>
                        <p>a partir de</p>
                        <p class="price">R$ 399,90</p>
                    </div>
                </div>
            </div>
            <div class="helper">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ path('cadeira.png') }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-5">
                        <h2>office chairs</h2>
                        <p>cadeiras operativas pensadas e desenvolvidas para serem aliadas da alta produtividade e do conforto nos ambientes corporativos.</p>
                        <p>a partir de</p>
                        <p class="price">R$ 399,90</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<section class="destaque">
    <div class="container">
        <p>produtos em destaque</p>
        <div class="row">
            <article class="produto" data-aos-delay="300" data-aos="fade">
                <div class="produto__img">
                <a href="/"><img src="{{ path('cadeira-destaque.png') }}" alt="Produto"></a>
                </div>
                <a href="/" class="produto__title">Berlim</a>
                <p class="produto__price">R$ 399,90</p>
            </article>

            <article class="produto" data-aos-delay="300" data-aos="fade">
                <div class="produto__img">
                <a href="/"><img src="{{ path('p2.png') }}" alt="Produto"></a>
                </div>
                <a href="/" class="produto__title">Coral</a>
                <p class="produto_sub">Ton Haas</p>
                <p class="produto__price">R$ 399,90</p>
            </article>

            <article class="produto" data-aos-delay="300" data-aos="fade">
                <div class="produto__img">
                <a href="/"><img src="{{ path('p3.png') }}" alt="Produto"></a>
                </div>
                <a href="/" class="produto__title">Fly</a>
                <p class="produto__price">R$ 399,90</p>
            </article>
            
            <article class="produto" data-aos-delay="300" data-aos="fade">
                <div class="produto__img">
                <a href="/"><img src="{{ path('p3.png') }}" alt="Produto"></a>
                </div>
                <a href="/" class="produto__title">Fly</a>
                <p class="produto__price">R$ 399,90</p>
            </article>

            <article class="produto" data-aos-delay="300" data-aos="fade">
                <div class="produto__img">
                <a href="/"><img src="{{ path('p3.png') }}" alt="Produto"></a>
                </div>
                <a href="/" class="produto__title">Fly</a>
                <p class="produto__price">R$ 399,90</p>
            </article>
        </div>
        <p>outlet</p>
        <div class="row">
            <article class="produto" data-aos-delay="300" data-aos="fade">
                <div class="produto__img">
                <a href="/"><img src="{{ path('p3.png') }}" alt="Produto"></a>
                </div>
                <a href="/" class="produto__title">Fly</a>
                <p class="produto__price">R$ 399,90</p>
            </article>
            
            <article class="produto" data-aos-delay="300" data-aos="fade">
                <div class="produto__img">
                <a href="/"><img src="{{ path('p3.png') }}" alt="Produto"></a>
                </div>
                <a href="/" class="produto__title">Fly</a>
                <p class="produto__price">R$ 399,90</p>
            </article>

            <article class="produto" data-aos-delay="300" data-aos="fade">
                <div class="produto__img">
                <a href="/"><img src="{{ path('p3.png') }}" alt="Produto"></a>
                </div>
                <a href="/" class="produto__title">Fly</a>
                <p class="produto__price">R$ 399,90</p>
            </article>
        </div>
    </div>
</section>
<section class="sobre">
    <div class="container">
        <div class="row">
            <div class="col-md-7" >
                <img src="{{ path('sobre.png') }}" class="img-fluid" alt="" data-aos="fade-in" data-aos-delay="100">
            </div>
            <div class="col-md-5">
                <h2 data-aos="fade-in" data-aos-delay="100">sobre <br>a flexform</h2>
                <p data-aos="fade-down" data-aos-delay="300">com uma equipe de écnicos e engenheiros altamente especializados, a Flexform é primeira empresa ncional acreditada pela UL uma certificadora global que é destaque no mercado internacional</p>
                <a href="#" data-aos="fade-up" data-aos-delay="400">conheça nossa história</a>
            </div>
        </div>
    </div>
</section>
@endsection