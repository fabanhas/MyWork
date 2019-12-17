<section class="filtros">
  <div class="wrap">
    @foreach($filtros as $filtro)
      @if($filtro->slug == 'acabamento' || 
          $filtro->slug == 'cobertura'  || 
          $filtro->slug == 'cor'        || 
          $filtro->slug == 'substrato'  || 
          $filtro->slug == 'tamanho')
        <div>
          <p>{{ $filtro->label }}</p>
          <select name="{{ $filtro->slug }}" id="{{ $filtro->slug }}">
            <option value="todos">Todos</option>
            @foreach($filtro->values as $value)
              <option value="{{ $value->value }}">{{ $value->value }}</option>
            @endforeach
          </select>
        </div>
      @endif
    @endforeach
  </div>
</section>
@push('afterPageScripts')
<script>
$(document).ready(function() {
  let url = new URL(window.location)
  let filtros = ['cor', 'substrato', 'tamanho', 'cobertura', 'acabamento']

  const insertValue = function(name) {
    $('.filtros select[name='+ name +'] option:first').text(url.searchParams.get(name))
  }

  filtros.forEach((item) => {
    url.searchParams.has(item) ? insertValue(item) : console.log('fail')
  })

  $('.filtros select').on('change', function() {
    var url = window.location.href.split('?')
    window.location.replace(url[0] + '?' + $(this).attr('name') + '=' + $(this).val())
  })
})
</script>
@endpush