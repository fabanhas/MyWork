@extends(engine_view('base'))
@section('conteudo')
@section('title', 'Contato')
    <section class="inst">
        <div class="container">
            <hr>
            <p class="d-none d-md-flex">contato <span class="ml-md-auto">home / institucional / contato</span></p>
                <div class="row mt-5">
                    <div class="col-xl-3">
                        <aside>
                            <ul>
                                <h4>INSTITUCIONAL</h4>
                                <li><a href="/quem-somos" >quem somos</a></li>
                                <li><a href="/seguranca">segurança</a></li>
                                <li><a href="/politica-de-privacidade">política de privacidade</a></li>
                                <li><a href="/termos-e-condicoes">termos e condições</a></li>
                                <li><a href="" class="active">contato</a></li>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-xl-9">
                        <h2>envie sua mnensagem</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam error odit harum consectetur accusamus non alias perspiciatis blanditiis beatae nulla culpa possimus, dolor optio similique, dolore veritatis earum quas officiis!</p>
                        <form action="#" id="my-form" method="POST">
                            <div class="row">
                                <div class="col-xl-6">
                                    Nome<br>
                                    <input type="text" name="nome" required><br>
                                    Email<br>
                                    <input type="email" name="email" required><br>
                                    Assunto<br>
                                    <select name="" id="">
                                        <option value="selecione" disabled selected>Selecione...</option>
                                            <option value="Pedido">Pedido</option>
                                            <option value="Cadastro">Cadastro</option>
                                            <option value="Informacao">Informação</option>
                                            <option value="Orcamento">Orçamento</option>
                                            <option value="Sugestao">Sugestão</option>
                                            <option value="Reclamacao">Reclamação</option>
                                            <option value="Elogio">Elogio</option>
                                            <option value="Outros">Outros</option>
                                    </select>
                                </div>
                                <div class="col-xl-6">
                                    Mensagem<br><br>
                                    <textarea name="" id="mensagem" cols="30" rows="10" required></textarea>
                                </div>
                            </div>
                            <input type="submit" value="enviar mensagem"> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
    <script>
    $(document).ready(function() {
        //Form contato
        $('#my-form').submit(function(e) {
            var fake = '11';
            e.preventDefault();
            
            TriggerCostumerMessage.trigger(
            $('#my-form').find('#assunto').val(),
            $('#my-form').find('[name="nome"]').val(),
            fake,
            $('#my-form').find('[name="email"]').val(),
            
            $('#my-form').find('#mensagem').val()
            )
        });
    });
    </script>
@endpush
@endsection