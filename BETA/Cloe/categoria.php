<?php include 'header.php'; ?>
    <section class="categoria">
        <section class="breadcumb">
            <div class="container text-center">
                <h2 class="serif">Categoria</h2>
                <p>home / categoria</p>
            </div>
        </section>
        <div class="container">
            <div class="flex">
                <aside class="menu__categorias" id="filters" data-aos="fade-in" >
                    <ul>
                        <h2 class="serif">Subcategorias</h2>
                        <li><a href="#">Subcategoria 1</a></li>
                        <li><a href="#">Subcategoria 2</a></li>
                        <li><a href="#">Subcategoria 3</a></li>
                        <li><a href="#">Subcategoria 4</a></li>
                        <li><a href="#">Subcategoria 5</a></li>
                    </ul>
                    <ul data-selectable="true">
                        <h2 class="serif">Cores</h2>
                        <li class="active">
                            <a class="in" href="#">
                            <input type="checkbox"/>
                            <label for="formatos0"></label>
                           Branco
                            </a>
                        </li> 
                        <li>
                            <a class="in" href="#">
                            <input type="checkbox"/>
                            <label for="formatos0"></label>
                            Azul
                            </a>
                        </li> 
                        <li>
                            <a class="in" href="#">
                            <input type="checkbox"/>
                            <label for="formatos0"></label>
                            Roxo
                            </a>
                        </li> 
                    </ul>
                </aside>

            <section class="vitrine interna">
                <section class="filtros">
                    <div class="filtros-mobile" data-fancybox data-src="#filters" data-touch="false">
                      filtrar
                    </div>
                  <div class="left">
                    <div class="ordenar">
                        <p>
                        Ordernar por
                        </p>
                      <select name="ordenar" id="ordenar">
                        <option value="selecione" disabled selected style="color:gray" value="null">Selecione...</option>
                        <option value="preco_asc">Maior valor</option>
                        <option value="preco_desc">Menor valor</option>
                      </select>
                    </div>
                  </div>
                  
                </section>


                <div class="flex justify-content-between ">
                    <a href="#" class="item">
                        <div class="produto-item">
                            <div class="produto-img">
                                <img src="assets/img/p1.png" class="img-fluid" alt="#">
                            </div>
                            <div class="produto-desc">
                                <h2>Top cartas para julieta</h2>
                                <h3>R$ 300,70</h3>
                                <p>10x R$ 30,70</p>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="item">
                        <div class="produto-item">
                            <div class="produto-img">
                                <img src="assets/img/p2.png" class="img-fluid" alt="#">
                            </div>
                            <div class="produto-desc">
                                <h2>Top cartas para julieta</h2>
                                <h3>R$ 300,70</h3>
                                <p>10x R$ 30,70</p>
                            </div>                
                        </div>
                    </a>
                    <a href="#" class="item">
                        <div class="produto-item">
                            <div class="produto-img">
                                <img src="assets/img/p3.png" class="img-fluid" alt="#">
                            </div>
                            <div class="produto-desc">
                                <h2>Top cartas para julieta</h2>
                                <h3>R$ 300,70</h3>
                                <p>10x R$ 30,70</p>
                            </div>
                        </div>
                    </a>
                </div>
              </section>
            </div>
        </div>
    </section>
<?php include 'footer.php'; ?>