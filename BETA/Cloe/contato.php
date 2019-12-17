<?php include 'header.php'; ?>
<section class="categoria">
        <section class="breadcumb">
            <div class="container text-center">
                <h2 class="serif">Categoria</h2>
                <p>home / categoria</p>
            </div>
        </section>
    </section>
    <section class="inst">
        <div class="container">
                <div class="row ">
                    <div class="col-xl-3">
                        <aside>
                            <ul>
                                <h4 class="serif">Contato</h4>
                                <li><a href="" class="active">quem somos</a></li>
                                <li><a href="">segurança</a></li>
                                <li><a href="">política de privacidade</a></li>
                                <li><a href="">termos e condições</a></li>
                                <li><a href="">contato</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-xl-9">
                        <h2 class="serif text-white">Envie sua mensagem</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam error odit harum consectetur accusamus non alias perspiciatis blanditiis beatae nulla culpa possimus, dolor optio similique, dolore veritatis earum quas officiis!</p>
                        <form action="#" id="my-form" method="POST">
                            <div class="row text-white">
                                <div class="col-xl-6">
                                    Nome<br>
                                    <input type="text"><br>
                                    Email<br>
                                    <input type="text"><br>
                                    Assunto<br>
                                    <select name="" id="">
                                        <option disable selected>Selecione...</option>
                                        <option value="">assunto</option>
                                        <option value="">assunto</option>
                                    </select>
                                </div>
                                <div class="col-xl-6">
                                    Mensagem<br><br>
                                    <textarea name="" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <input class="serif" type="submit" value="enviar mensagem"> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'footer.php'; ?>