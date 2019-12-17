@extends(engine_view('base'))
@section('conteudo')
@section('title', $categoria->model->name)
<main>
  @if($categoria->model->extraFields->has('banner_categoria'))
    <section class="categoria-banner">
      <img src="{{ thumb($categoria->model->extraFields->get('banner_categoria')->values->first()->source, 1920, 220) }}">
    </section>
  @endif
  <h2 class="head breadcrumb">Home / {{ $categoria->model->name }} <br><span>{{ $categoria->model->name }}</span></h2>
  <div class="modelos wrap">
    <div class="column accordion"></div>
  </div>
  @push('styles')
  <link rel="stylesheet" href="{{ stylesheet('jquery-ui-min.css') }}">
  @endpush
  @push('afterPageScripts')
  <script src="{{ script('jquery-ui-min.js') }}"></script>
  <script>
    $(document).ready(function() {
      function createModelos(categorias, modelos) {
        let arr = Object.values(categorias)

        arr.map((category, index) => {
          $('.modelos .column').append(`
            <h3 id="${ category.id }">${ category.dataTag.name }</h3>
            <div></div>
          `)
        })

        modelos.map((modelo, index) => {
          if( modelo.hasOwnProperty('arquivo') ) {
            if( modelo.categoria.values.length > 1 ) {
              // Modelo tem uma ou mais categorias
              modelo.categoria.values.map((modeloCat) => {
                // Impede de adicionar a categoria raiz (MODELOS)
                if( modeloCat.category_parent_id !== null ) {
                  $('.column h3#' + modeloCat.id).next().append(`
                    <a href="https://assets.betalabs.net/production/gcolor/${ modelo.arquivo.values[0].file_path }" download="${ modelo.arquivo.values[0].original_file_name }">${ modelo.nome.values[0].value }</a>
                  `)
                }
              })
            } else {
              // Modelo tem apenas uma categoria
              if( modelo.categoria.values[0].category_parent_id !== null ) {
                // Impede de adicionar a categoria raiz (MODELOS)
                $('.column h3#' + modelo.categoria.values[0].id).next().append(`
                  <a href="https://assets.betalabs.net/production/gcolor/${ modelo.arquivo.values[0].file_path }" download="${ modelo.arquivo.values[0].original_file_name }">${ modelo.nome.values[0].value }</a>
                `)
              }
            }
          }
        })
      }

      fetch(window.location.href, {
        headers: {
          'Accept'           : 'application/json',
          'Content-Type'     : 'application/json',
          'X-Requested-With' : 'XMLHttpRequest'
        }
      }).then(response => response.json())
        .then(data => {
          if( null !== data.categorias && null !== data.modelos ) {
            createModelos(data.categorias.collection[24].children, data.modelos.records)

            $('.accordion').accordion({
              heightStyle: "content",
              collapsible: true,
              active: false
            })
          }
        })
    })
  </script>
  @endpush
</main>
@endsection