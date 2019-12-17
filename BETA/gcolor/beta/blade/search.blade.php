@if(!request()->ajax())
@extends(engine_view('base'))
@section('conteudo')
@section('title', 'Resultados da busca')
<main>
  <h2 class="head breadcrumb">Home / Resultados da busca <br><span>Resultados da busca</span></h2>
  @include(engine_view('filtros'), ['filtros' => $searchResult->extraFields])
  <section class="mais-produtos interna">
    <div class="wrap flex">
@endif
      @foreach($searchResult->items as $item)
        @include(engine_view('item'))
      @endforeach
@if(!request()->ajax())
    </div>
    <div class="paginacao">
      @if($searchResult->items->isNotEmpty() && $searchResult->collection->count() >= 24)
        <div style="margin-top: 15px;">
          <button canopus-showcase-infinite-scroll-more>Carregar mais produtos...</button>
        </div>
      @endif
    </div>
  </section>
</main>
@endsection
@endif