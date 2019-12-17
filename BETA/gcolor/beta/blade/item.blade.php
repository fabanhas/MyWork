<article class="item">
  <div class="item--image">
    @if($item->main_image->source)
      <a @if($item->urls->first()) href="{{ url($item->urls->first()->url) }}" @endif><img src="{{ thumb($item->main_image->source) }}" alt="{{ $item->identification->first()->name }}"></a>
    @else
      <a @if($item->urls->first()) href="{{ url($item->urls->first()->url) }}" @endif><img src="{{ path('product-placeholder.png') }}" alt=""></a>
    @endif
  </div>
  <div class="item--description">
    <a class="item--name" @if($item->urls->first()) href="{{ url($item->urls->first()->url) }}" @endif>{{ $item->identification->first()->name }}</a>
    @itemAvailable($item)
      <div class="item--prices">
        @hasDiscount($item)
        <p class="item--old-price">R$ {{ number_format($item->prices->first()->originalPrice, 2, ',', '.') }}</p>
        @endhasDiscount
        <p class="item--new-price">R$ {{ $item->prices->first()->price ? number_format($item->prices->first()->price, 2, ',', '.') : '' }}</p>
        @if($item->prices->first()->installments->count() > 0)
        <p class="item--parcelas">até <span>{{ $item->prices->first()->installments->last()->getQuantity }}x</span> de <span>R$ {{ number_format($item->prices->first()->installments->last()->getPrice, 2, ',', '.') }}</span> sem juros</p>
        @endif
      </div>
    @enditemAvailable
    @itemAvailable($item)
    <a href="{{ url($item->urls->first()->url) }}" class="item--comprar">Comprar</a>
    @else
    <a href="javascript:;" class="item--comprar" canopus-open-item-availability-alert-modal="{{ $item->id }}">Indisponível</a>
    @enditemAvailable
  </div>
</article>