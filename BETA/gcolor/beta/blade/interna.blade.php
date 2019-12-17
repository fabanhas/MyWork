@extends(engine_view('base'))
@section('conteudo')
@section('title', $pagina->model->description)
<main>
  <h2 class="head breadcrumb">Home / {{ $pagina->model->description }} <br><span>{{ $pagina->model->description }}</span></h2>
  @if(request()->path() == 'perguntas-frequentes')
    @if($perguntas->records->count() > 0)
      <section class="interna--search">
        <div class="wrap">
          <form class="search" action="#">
            <input type="text" placeholder="Faça uma pergunta!" name="term">
            <label for="pesquisar"><i class="search__icon"></i></label>
            <input type="submit" name="pesquisar" value="">
          </form>
        </div>
      </section>
    @endif
  @endif
  <div class="interna--wrap">
    <aside class="interna--lateral">
      <ul>
        <h2>Categorias</h2>
        <li><a href="javascript:;">Montagem e fechamento de arquivos</a></li>
        <li><a href="javascript:;">Perguntas frequentes</a></li>
        <li><a href="javascript:;">Como comprar</a></li>
        <li><a href="javascript:;">Transporte</a></li>
      </ul>
    </aside>
    <section class="interna--content">
      @if(request()->path() !== 'fale-conosco' && request()->path() !== 'perguntas-frequentes')
        <p>{!! $pagina->model->content !!}</p>
      @endif

      @if(request()->path() == 'fale-conosco')
        <section class="interna--contato">
          <div class="interna--social">
            <ul class="telefones">
              <li><i class="phone__icon"></i></li>
              <li>
                <p>Porto Alegre</p>
                <a href="javascript:;">(51) 3237-9169</a>
              </li>
              <li>
                <p>Rio de Janeiro</p>
                <a href="javascript:;">(21) 4042-7704</a>
              </li>
              <li>
                <p>São Paulo</p>
                <a href="javascript:;">(11) 3280-6890</a>
              </li>
            </ul>
            <div class="whats">
              <div>
                <i class="whats__icon"></i>
              </div>
              <div>
                <p>WhatsApp</p>
                <a href="javascript:;">(11) 99999-9999</a>
              </div>
            </div>
            <div class="email">
              <i class="email__icon"></i>
              <a href="#">grafica@gcolor.com.br</a>
            </div>
            <div class="horario">
                <p><strong>Horário de atendimento:</strong> segunda a sexta, de 8h às 17h30 (fechado 12h)</p>
            </div>
          </div>
          <form action="#">
            <div class="left">
              <label for="nome">Nome</label>
              <input type="text">
              <label for="emial">E-mail</label>
              <input type="text">
              <label for="assunto">Assunto</label>
              <select name="assunto" id="assunto">
                <option value="selecione" disabled selected>Selecione...</option>
                <option value="teste">teste</option>
              </select>
            </div>
            <div class="right">
              <label for="mensagem">Mensagem</label>
              <textarea name="mensagem" id="mensagem"></textarea>
              <input type="submit" value="enviar mensagem">
            </div>
          </form>
        </section>
      @endif

      @if(request()->path() == 'perguntas-frequentes')
        @if($perguntas->records->count() > 0)
        <section class="interna--faq">
          @foreach($perguntas->records as $pergunta)
          <h3>{{ $pergunta->pergunta->values->first()->value }}</h3>
          <div>
            <div class="padding">
              <p>{!! $pergunta->resposta->values->first()->value !!}</p>
            </div>
          </div>
          @endforeach
        </section>
        @endif
        @push('afterPageScripts')
        <script>
          $(document).ready(function() {
            let perguntas = []
            fetch(window.location.href, {
              headers: {
                'Accept'           : 'application/json',
                'Content-Type'     : 'application/json',
                'X-Requested-With' : 'XMLHttpRequest'
              }
            }).then(response => response.json())
              .then(data => {
                perguntas = data.perguntas.records
                console.log(data)
              })

            $('.interna--search .search').on('submit', function(e) {
              e.preventDefault()
              let form = $(this)
              let result = searchQuestion(form.find('input[type=text]').val().toLowerCase())
            })

            function searchQuestion(text) {
              let result = []

              perguntas.find((item) => {
                let inQuestion = item.pergunta.values[0].value.toLowerCase().indexOf(text)
                let inAnswer = item.resposta.values[0].value.toLowerCase().indexOf(text)

                if(inQuestion !== -1 || inAnswer !== -1) {
                  result.push(item)
                }
              })

              if(result.length > 0) {
                let html = ""
                $('.interna--faq').accordion("destroy").html('')

                result.forEach((item) => {
                  html += `
                  <h3 class="ui-accordion-header">${item.pergunta.values[0].value}</h3>
                  <div class="ui-accordion-content"><div class="padding">${item.resposta.values[0].value}</div></div>
                  `
                })

                $('.interna--faq').html(html)
                $('.interna--faq').accordion({
                  collapsible: true,
                  active: false,
                  heightStyle: "content"
                })
              } else {
                $('.interna--faq').prepend('<h2>Resultado não encontrado.</h2><br><br>')
              }
            }
          })
        </script>
        @endpush
      @endif
    </section>
  </div>
</main>
@push('afterPageScripts')
<script src="{{ script('jquery-ui-min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('.interna--faq').accordion({
      collapsible: true,
      active: false,
      heightStyle: "content"
    })
  })
</script>
@endpush
@endsection