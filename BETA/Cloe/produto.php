<?php include 'header.php'; ?>
    <section class="categoria">
        <section class="breadcumb">
            <div class="container text-center">
                <h2 class="serif">Categoria</h2>
                <p>home / categoria</p>
            </div>
        </section>
    </section>
    <section class="produto">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="principal owl-carousel" data-slider-id="1">
                        <img class="img-fluid" src="{{ path('produto.png') }}" alt="Produto">
                        <img class="img-fluid" src="{{ path('produto.png') }}" alt="Produto">
                    </div>
                    <div class="thumbs owl-thumbs" data-slider-id="1">
                        <button class="owl-thumb-item"><img class="img-fluid" src="{{ path('produto.png') }}" alt="Produto"></button>
                        <button class="owl-thumb-item"><img class="img-fluid" src="{{ path('produto.png') }}" alt="Produto"></button>
                    </div>
                </div>
                
                <div class="col-md-6 text-center px-5 text-white">
                    <h2 class="produto-title">Blusa Parker</h2>
                    <p class="descricao">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro sit suscipit et impedit, rem consequuntur minus totam eveniet quam deserunt facilis rerum quidem error ipsam dolorem ipsa maxime amet magni!</p>
                    <hr>
                    <p class="wb">Cores disponiveis</p>
                    <div class="cores">
                        <a href="" style="background-color: #522D43" class="selected"></a>
                        <a href="" style="background-color: #FF7364"></a>
                    </div>
                    <p class="wb">Tamanhos disponiveis</p>
                    <div class="tamanhos">
                        <a href="" class="selected">P</a>
                        <a href="">M</a>
                    </div>
                    <h2 class="produto-preco">
                        R$ 300,70
                    </h2>
                    <p class="parcela">10x R$ 30,70 ou R$ 279,90 à vista</p>
                    <div class="qtd">
                        <p>Quantidade</p>
                        <i class="fas fa-chevron-down"></i>
                        <input type="text" value="1">
                        <i class="fas fa-chevron-up"></i>
                    </div>
                    <a href="" id="btn-comprar" class="serif">
                        <span class="icone bag"></span>
                        Comprar
                    </a>
                    <div class="share">
                        <p>Compartilhe: </p>
                        <a href="#">
                            <img src="{{ path('face.png') }}" alt="">
                        </a>
                        <a href="#">
                            <img src="{{ path('wpp.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="detalhes">
        <div class="container">
            <h2 class="serif text-white text-center mb-4">Detalhes do produto</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum perspiciatis, veritatis debitis qui quisquam voluptatibus ipsam consequuntur adipisci quam aut eius architecto enim itaque suscipit minus, nostrum consectetur ex sit!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem modi magnam illo consequatur ea pariatur! Facere ex ea deleniti. Rerum maiores nemo ipsum nihil modi perferendis officiis. Quae, repellat officiis? Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem atque id, laudantium vero facere nobis reiciendis amet eveniet tempore eligendi dolor at suscipit non aut enim iusto. Vitae, impedit amet!</p>
        </div>
    </section>
    <section class="relacionados">
        <div class="container">
            <div class="slider-relacionado">
                <a href="#" class="slider-item px-1">
                    <div class="produto-item">
                        <div class="produto-img">
                            <img src="{{ path('p1.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="produto-desc">
                            <h2>Top cartas para julieta</h2>
                            <h3>R$ 300,70</h3>
                            <p>10x R$ 30,70</p>
                        </div>
                        <div class="cores">
                            <button href="#" style="background-color: #522D43" class="selected"></button>
                            <button href="#" style="background-color: #FF7364"></button>
                        </div>
                    </div>
                </a>
                <a href="#" class="slider-item px-1">
                    <div class="produto-item">
                        <div class="produto-img">
                            <img src="{{ path('p2.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="produto-desc">
                            <h2>Top cartas para julieta</h2>
                            <h3>R$ 300,70</h3>
                            <p>10x R$ 30,70</p>
                        </div>          
                        <div class="cores">
                            <button href="#" style="background-color: #522D43" class="selected"></button>
                            <button href="#" style="background-color: #FF7364"></button>
                        </div>      
                    </div>
                </a>
                <a href="#" class="slider-item px-1">
                    <div class="produto-item">
                        <div class="produto-img">
                            <img src="{{ path('p3.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="produto-desc">
                            <h2>Top cartas para julieta</h2>
                            <h3>R$ 300,70</h3>
                            <p>10x R$ 30,70</p>
                        </div>
                        <div class="cores">
                            <button href="#" style="background-color: #522D43" class="selected"></button>
                            <button href="#" style="background-color: #FF7364"></button>
                        </div>
                    </div>
                </a>
                <a href="#" class="slider-item px-1">
                    <div class="produto-item">
                        <div class="produto-img">
                            <img src="{{ path('p1.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="produto-desc">
                            <h2>Top cartas para julieta</h2>
                            <h3>R$ 300,70</h3>
                            <p>10x R$ 30,70</p>
                        </div>
                        <div class="cores">
                            <button href="#" style="background-color: #522D43" class="selected"></button>
                            <button href="#" style="background-color: #FF7364"></button>
                        </div>
                    </div>
                </a>

            </div>
        </div>
    </section>


<?php include 'footer.php'; ?>
<script>
    $('.principal').owlCarousel({
          items: 1,
          loop: true,
          thumbs: true,
          thumbImage: false,
          thumbsPrerendered: true,
          mouseDrag: true,
          touchDrag: false,
          dots: false
        });
</script>