<?php include 'header.php'; ?>
<section class="helper" style="background-image: url(assets/img/fundo-page.png)"></section>
<section class="inst">
    <div class="container">
        <h2 class="sri orange">Fale Conosco</h2>
        <p>Home / Fale conosco</p>
    </div>
</section>
<section class="inst-sec mb-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-3">
                <aside class="inst">
                    <ul>
                        <h4>Dúvidas</h4>
                        <li><a href="/quem-somos">Quem Somos</a></li>
                        <li><a href="/segurança">Segurança</a></li>
                        <li><a href="/politica-de-privacidade">Política de Privacidade</a></li>
                        <li><a href="/termos-e-condicoes">Termos e Condições</a></li>
                        <li><a href="" class="active">Contato</a></li>
                    </ul>
                </aside>
            </div>
            <div class="col-xl-6">
                <div class="contact-form">
                    <h2 class="sri orange">Envie sua mensagem</h2>
                    <form action="#" method="POST" id="form-contato">
                        <input type="text" name="nome" required placeholder="Nome">
                        <input type="email" name="email" required placeholder="E-mail">
                        <select name="assunto" id="assunto" required>
                            <option disable selected>Assunto</option>
                            <option value="">assunto</option>
                            <option value="">assunto</option>
                        </select>
                        <textarea name="mensagem" id="mensagem" cols="30" rows="10" required placeholder="Mensagem"></textarea>
                        <input type="submit" value="Enviar mensagem">
                    </form>
                </div>
            </div>
            <div class="col-md-3 pt-5 form-side">
                <a href="">11 4004-4000</a>
                <a href="">email@dominio.com.br</a>
                <div class="d-flex mt-3">
                    <a href="" class="mr-2" target="_blank">
                        <img src="assets/img/face.png" alt="">
                    </a>
                    <a href="" class="mr-2" target="_blank">
                        <img src="assets/img/twitter.png" alt="">
                    </a>
                    <a href="" class="mr-2" target="_blank">
                        <img src="assets/img/insta.png" alt="">
                    </a>
                    <a href="" class="mr-2" target="_blank">
                        <img src="assets/img/linkedin.png" alt="">
                    </a>
                </div>
                <h3 class="orange mt-3"><b>Easy Dinner</b></h3>
                <p>Praça das Constelações 175
                <br>
                Loja 103 - Santa Lúcia
                <br>
                Belo Horizonte/MG
                <br>
                Cep 30360-320
                </p>
                <p>
                Easy Dinner Alimentos LTDA
                <br>
                CNPJ: 33.914.774/0001-87
                <br>
                IE: 003468871.00-62
                </p>
            </div>
        </div>
    </div>
</section>
<?php include 'footer.php'; ?>