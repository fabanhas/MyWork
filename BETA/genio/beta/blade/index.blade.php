@extends(engine_view('base'))
@section('conteudo')
@section('title', 'Home')
<section id="conheca" class="bg-about py-5 position-relative">

  <div class="container">
    <div class="row">
      <div class="col-md-5 p-md-5">
        @if(null !== $clube->records->first()->titulo_conheca)
          <h2 class="text-uppercase text-purple text-title">{{ $clube->records->first()->titulo_conheca->values->first()->value }}</h2>
        @endif
        @if(null !== $clube->records->first()->descricao)
          <p>{!! $clube->records->first()->descricao->values->first()->value !!}</p>
        @endif
      </div>
    </div>
  </div>

  <img src="{{ path('genio-thinking.png') }}" class="mascot position-absolute d-none d-md-block" width="286" height="633">

</section>
<!-- meet the genius -->

<section id="planos" class="plans bg-diamonds py-5 d-md-flex align-items-center justify-content-center">
  <div class="container">

    <h2 class="text-uppercase text-center text-title text-white">Conheça nossos planos</h2>
    <div class="row mt-5">

      @if(null !== $planos->collection)
        @foreach($planos->collection as $plano)
          <div class="plano col-md-4 mb-5 mb-md-0">
            <div class="line rounded-15 bg-white p-4 pb-5">
              <h3 class="text-center text-uppercase">{{ $plano->extraFields->has('label') ? $plano->extraFields->get('label')->values->first()->value : $plano->description }}</h3>
              @if($plano->extraFields->has('diferenciais'))
                <ul class="mt-5 mb-4 text-center">
                  @foreach($plano->extraFields->get('diferenciais')->values as $diferencial)
                    <li>{{ $diferencial->record->texto->values->first()->value }}</li>
                  @endforeach
                </ul>
              @endif
              @if($plano->id !== 3)
                <p class="price text-center text-title"><sup>R$</sup> {{ explode(',', number_format($plano->amount, 2, ',', '.'))[0] }}<sup>,{{ explode(',', number_format($plano->amount, 2, ',', '.'))[1] }}</sup></p>
              @endif
            </div>
            <div class="text-center">
              @if($plano->id !== 3)
                {{-- <a href="/checkout/cart/plan/add/{{ $plano->id }}?redirect_to=checkout/cart" class="btn btn-lg rounded-pill py-2 px-5">Assinar!</a> --}}
                <a href="javascript:;" class="default btn btn-lg rounded-pill py-2 px-5" data-id="{{ $plano->id }}">Assinar!</a>
              @else
                <a href="javascript:;" class="personalizado btn btn-lg rounded-pill py-2 px-5">Assinar!</a>
              @endif
            </div>
          </div>
          <!-- plan -->
        @endforeach
        @push('scripts')
        <script>
          $(document).ready(function() {
            let planos = $('.plano')
            let cores = ['blue', 'yellow', 'purple']

            planos.each(function(index, item) {
              $(item).find('h3').addClass('text-' + cores[index])
              $(item).find('a').addClass('btn-' + cores[index])
              $(item).find('.line').addClass('line-' + cores[index])
            })
          })
        </script>
        @endpush
      @endif

    </div>

  </div>
</section>
<!-- plans -->

<section id="segredo" class="secret py-5">
  <div class="container">

    <div class="row">

      <div class="col-md-8">
        @if(null !== $clube->records->first()->titulo_segredo)
          <h2 class="text-uppercase text-blue text-title">{{ $clube->records->first()->titulo_segredo->values->first()->value }}</h2>
        @endif
        @if(null !== $clube->records->first()->descricao_segredo)
          <p>{!! $clube->records->first()->descricao_segredo->values->first()->value !!}</p>
        @endif
      </div>

      <div class="col-md-4 text-center">
        <img src="{{ path('box.png') }}" class="img-fluid">
      </div>

    </div>

  </div>
</section>
<!-- secret -->

<div class="modal micromodal-slide" id="plano-personalizado" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="plano-personalizado-title">
      <section class="modal__header">
        <h1>Teste</h1>
      </section>
      <section class="modal__content" id="plano-personalizado-content">
        <div class="option option-default">
          @if( null !== $faixas->records )
            <form data-id>
              <h3>Selecione a faixa etária</h3>
              <select name="faixa-etaria" id="faixa-etaria-default">
                @foreach( $faixas->records as $faixa )
                  <option value="{{ $faixa->idade ? $faixa->idade->values->first()->value : false }}">{{ $faixa->idade ? $faixa->idade->values->first()->value : false }}</option>
                @endforeach
              </select>
              <button type="submit" class="btn btn-lg rounded-pill py-2 px-5 btn-purple">Assinar!</button>
            </form>
          @endif
        </div>
        <div class="option option-personalizado">
          @if( null !== $personalizados->collection )
            <form>
              <h3>Escolha a quantidade de crianças</h3>
              <select name="qtd-criancas" id="qtd-criancas">
                <option disabled selected>Selecione o plano</option>
                @foreach( $personalizados->collection as $personalizado )
                  <option data-val="{{ number_format($personalizado->amount, 2, ',', '.') }}" value="{{ $personalizado->id }}">{{ $personalizado->extraFields->has('label') ? $personalizado->extraFields->get('label')->values->first()->value : $personalizado->description }}</option>
                @endforeach
              </select>
              <div class="faixa-etaria">
                @if( null !== $faixas->records )
                  <h3>Selecione a faixa etária</h3>
                  <select name="faixa-etaria" id="faixa-etaria-personalizado" class="parent">
                    @foreach( $faixas->records as $faixa )
                      <option value="{{ $faixa->idade ? $faixa->idade->values->first()->value : false }}">{{ $faixa->idade ? $faixa->idade->values->first()->value : false }}</option>
                    @endforeach
                  </select>
                @endif
              </div>
              <p class="price text-center text-title text-blue"><sup>R$</sup> {{ explode(',', number_format($personalizados->collection[0]->amount, 2, ',', '.'))[0] }}<sup>,{{ explode(',', number_format($personalizados->collection[0]->amount, 2, ',', '.'))[1] }}</sup></p>
              <button type="submit" class="btn btn-lg rounded-pill py-2 px-5 btn-purple">Assinar!</button>
            </form>
          @else
          <h3>Não existe plano personalizado atualmente.</h3>
          @endif
        </div>
      </section>
    </div>
  </div>
</div>
<!-- Modal plano personalizado -->

@push('styles')
<link rel="stylesheet" href="{{ stylesheet('micromodal.css') }}">
@endpush
@push('scripts')
<script src="https://unpkg.com/micromodal/dist/micromodal.min.js"></script>
<script src="{{ script('planos.js') }}"></script>
@endpush
@endsection