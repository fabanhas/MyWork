<?php include 'header.php'; ?>
    <section class="categoria">
        <div class="container">
            <div class="flex">
                <aside class="menu__categorias" id="filters" data-aos="fade-in" >
                    <ul data-selectable="true">
                        <h2 >Linhas</h2>
                        <div class="collapse-div">
                            <li class="active">
                                <a class="in">
                                <input type="checkbox"/>
                                <label for="formatos0"></label>
                                office Chairs
                                </a>
                            </li> 
                            <li>
                                <a class="in">
                                <input type="checkbox"/>
                                <label for="formatos0"></label>
                                collaborative
                                </a>
                            </li> 
                            <li>
                                <a class="in">
                                <input type="checkbox"/>
                                <label for="formatos0"></label>
                                auditorio
                                </a>
                            </li> 
                        </div>
                    </ul>
                    <ul data-selectable="true">
                        <h2 >Cores</h2>
                        <div class="collapse-div">
                            <li class="active">
                                <a class="in">
                                <input type="checkbox"/>
                                <label for="formatos0"></label>
                                office Chairs
                                </a>
                            </li> 
                            <li>
                                <a class="in">
                                <input type="checkbox"/>
                                <label for="formatos0"></label>
                                collaborative
                                </a>
                            </li> 
                            <li>
                                <a class="in">
                                <input type="checkbox"/>
                                <label for="formatos0"></label>
                                auditorio
                                </a>
                            </li> 
                        </div>
                    </ul>
                </aside>

            <section class="vitrine interna">
                <section class="filtros">
                    <div class="filtros-mobile" data-fancybox data-src="#filters" data-touch="false">
                      filtrar
                    </div>
                  <div class="left">
                    <div class="ordenar">
                      <select name="ordenar" id="ordenar">
                        <option value="selecione" disabled selected style="color:gray" value="null">ORDENAR POR</option>
                        <option value="preco_asc">Maior valor</option>
                        <option value="preco_desc">Menor valor</option>
                      </select>
                      <span>+</span>
                    </div>
                  </div>
                  
                </section>


                <div class="flex">
                    <article class="produto" data-aos="fade">
                        <div class="produto__img">
                            <a href="/"><img src="assets/img/p1.png" alt="Produto"></a>
                        </div>
                        <a href="/" class="produto__title">Captain Lounge</a>
                        <p class="produto_sub">Baldanzi & Novelli</p>
                        <p class="produto__price">R$ 399,90</p>
                    </article>

                    <article class="produto" data-aos="fade">
                        <div class="produto__img">
                        <a href="/"><img src="assets/img/p2.png" alt="Produto"></a>
                        </div>
                        <a href="/" class="produto__title">Coral</a>
                        <p class="produto_sub">Ton Haas</p>
                        <p class="produto__price">R$ 399,90</p>
                    </article>

                    <article class="produto" data-aos="fade">
                        <div class="produto__img">
                        <a href="/"><img src="assets/img/p3.png" alt="Produto"></a>
                        </div>
                        <a href="/" class="produto__title">Fly</a>
                        <p class="produto__price">R$ 399,90</p>
                    </article>
                  
                </div>
              </section>
            </div>
        </div>
    </section>
<?php include 'footer.php'; ?>