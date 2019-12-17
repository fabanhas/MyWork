@extends(engine_view('base'))
@section('conteudo')
@section('title', $pagina->model->description)
<main>
  <h2 class="head breadcrumb">Home / {{ $pagina->model->description }} <br><span>{{ $pagina->model->description }}</span></h2>
  <div class="orcamento--wrap">
    <p>{!! $pagina->model->content !!}</p>

    <form id="form-orcamento" name="form-orcamento" enctype="multipart/form-data">
      <section class="orcamento--dados">
        <h3>Dados de contato</h3>
        <div class="campos">
          <div><input id="nome" name="nome_orcamento" type="text" placeholder="Nome"></div>
          <div><input id="e_mail" name="e_mail_orcamento" type="email" placeholder="E-mail"></div>
          <div><input id="telefone" name="telefone_orcamento" type="text" placeholder="Telefone"></div>
          <div><input id="celular" name="celular" type="text" placeholder="Celular"></div>
        </div>
        <p>Todos os pedidos de orçamentos devem conter um número de telefone e e-mail válidos para contato</p>
      </section>
      <section class="orcamento--dados">
        <h3>Dados do orçamento</h3>
        <div class="campos">
          <div><input id="produto_desejado" name="produto_desejado" type="text" placeholder="Produto desejado"></div>
          <div><input id="tamanho" name="tamanho" type="text" placeholder="Tamanho"></div>
          <div><input id="quantidade" name="quantidade" type="text" placeholder="Quantidade"></div>
          <div>
            <select id="impressao" name="impressao">
              <option value="impressao">Impressão</option>
            </select>
          </div>
          <div>
            <select id="papel" name="papel">
              <option value="papel">Papel</option>
            </select>
          </div>
          <div>
            <select id="arte_layout" name="arte_layout">
              <option value="arte-layout">Arte/Layout</option>
            </select>
          </div>
          <div><input id="cep_local_da_entrega" name="cep_local_da_entrega" type="text" placeholder="CEP do local de entrega"></div>
          <div><textarea name="detalhes_do_orcamento" id="detalhes_do_orcamento" placeholder="Descreva os detalhes complementares ao orçamento"></textarea></div>
        </div>
      </section>
      <section class="orcamento--dados anexos">
        <h3>Anexos</h3>
        <p>Envie abaixo os anexos para complementar seu pedido de orçamento</p>
        <div class="upload--files">
          <div class="upload">
            <input name="anexo_1" id="anexo_1" type="file">
            <label for="anexo_1" data-content="Nenhum arquivo selecionado">Escolher arquivo</label>
            <i class="fas fa-times"></i>
          </div>
          <span class="add-input">+ Adicionar mais imagens</span>
        </div>
      </section>
      <button type="submit" class="comprar"><a href="javascript:;">Enviar pedido de orçamento</a></button>
    </form>
    @push('afterPageScripts')
    <script src="{{ script('jquery-mask-min.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script>
      $(document).ready(function() {
        // Masks
        $('#telefone').mask('(00) 0000-0000')
        $('#celular').mask('(00) 00000-0000')
        $('#cep_local_da_entrega').mask('00000-000')

        $('#form-orcamento').on('submit', function(e) {
          e.preventDefault()
          let botao = $('.orcamento--wrap .comprar')
          let form = $(this)
          let inputs = form.find('input, select, textarea')

          $(inputs).on('change', function() {
            validate($(this))
          })

          if(validate(inputs)) {
            console.log($(this))
            console.log($(this)[0])
            $.ajax({
              url: '/ecommerce/ve/orcamentos/records/22',
              method: 'POST',
              data: new FormData($(this)[0]),
              cache: false,
              processData: false,
              contentType: false,
              headers: {
                Accept: "application/json",
                Authorization: 'Bearer ' + OauthService.getToken()
              },
              beforeSend: function() {
                botao.attr('disabled', 'disabled')
                botao.addClass('remove-cart')
                botao.html('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>')
              },
              success: function(data) {
                $('input[type=text], input[type=email], input[type=number], select, textarea').val('')
                $('div.valid').removeClass('valid')
                botao.addClass('success').html('Enviado!')
              }
            })
          }
        })

        function validate(inputs) {
          let regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
          let parent = null

          $.each(inputs, function(index, el) {
            el = $(el)
            parent = el.parent()
            parent.removeClass('invalid valid')

            if(el.val() == '') {
              parent.removeClass('valid')
              parent.addClass('invalid')

            } else if(el.attr('type') == 'email') {
              regex.test(el.val()) ? parent.addClass('valid') : parent.addClass('invalid')

            } else {
              parent.removeClass('invalid')
              parent.addClass('valid')
            }
          })
          
          if(inputs.length == $('.valid').length) {
            return true
          } else {
            return false
          }
        }
      })
    </script>
    @endpush
  </div>
</main>
@endsection