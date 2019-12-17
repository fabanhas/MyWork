@extends(engine_view('base'))
@section('conteudo')
@section('title', $pagina->model->description)
<section class="py-5 my-5">
  <div class="container">
    <h1 class="text-purple text-center">{{ $pagina->model->description }}</h1>
    <p class="breadcrumb text-center"><a href="/">home</a> / <a>institucional</a> / <span class="current">{{ $pagina->model->description }}</span></p>

    <div class="row">

      <div class="sidebar col-md-3 order-12 order-md-1 mb-5 mb-md-0">
        <div class="bg-gray rounded-15 p-4 line-blue shadow text-center">
          <h2 class="text-blue mb-4">navegue</h2>
          <ul>
            <li><a href="/quem-somos">Quem somos</a></li>
            <li><a href="/seguranca">Segurança</a></li>
            <li><a href="/politica-de-privacidade">Política de Privacidade</a></li>
            <li><a href="/termos-e-condicoes">Termos e condições</a></li>
            <li><a href="/fale-conosco">Contato</a></li>
          </ul>
        </div>
      </div>
      <!-- sidebar -->

      <div class="interna-content col-md-9 order-1 order-md-12">

        <div class="text">
          {!! $pagina->model->content !!}
        </div>
        <!-- text -->

        @if(request()->path() == 'fale-conosco')
        <form id="form-contato">
          <div>
            <label for="nome">Nome</label>
            <input id="nome" type="text" name="contato[nome]">
            <label for="email">E-mail</label>
            <input id="email" type="text" name="contato[email]">
            <label for="assunto">Assunto</label>
            <select id="assunto" name="contato[assunto]">
              <option>Selecione...</option>
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
          <div>
            <label for="mensagem">Mensagem</label>
            <textarea name="contato[mensagem]" id="mensagem"></textarea>
            <input type="submit" value="Enviar mensagem">
          </div>
        </form>
        @endif

      </div>

  </div>
  @push('scripts')
  <script>
    $(document).ready(function() {
      $('.sidebar ul li a').each(function(index, item) {
        $(item).attr('href') == window.location.pathname ? $(this).addClass('active') : false
      })

      $('#form-contato').submit(function(e) {
        let $form = $(this)
        e.preventDefault();

        TriggerCostumerMessage.trigger(
          $form.find('[name="contato[nome]"]').val(),
          $form.find('[name="contato[email]"]').val(),
          $form.find('[name="contato[assunto]"]').val(),
          $form.find('[name="contato[mensagem]"').val()
        )
      });
    })
  </script>
  @endpush
</section>
@endsection