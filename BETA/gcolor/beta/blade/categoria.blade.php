@if(!request()->ajax())
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
  @include(engine_view('filtros'), ['filtros' => $categoria->extraFields])
  <section class="mais-produtos interna">
    <div class="wrap flex" canopus-showcase-infinite-scroll>
@endif
    @foreach($categoria->collection->sortByDesc(function($item) {
        return $item->extraFields->has('ordem') ? $item->extraFields->get('ordem')->values->first()->value : -1;
     }) as $item)
        @include(engine_view('item'))
      @endforeach
@if(!request()->ajax())
    </div>
    <div class="paginacao">
      @if($categoria->collection->isNotEmpty() && $categoria->collection->count() >= 24)
        <div style="margin-top: 15px;">
          <button canopus-showcase-infinite-scroll-more>Carregar mais produtos...</button>
        </div>
      @endif
    </div>
  </section>
</main>
@endsection
@endif