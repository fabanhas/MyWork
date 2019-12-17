<article class="produto" data-aos="fade-in">
    <a @if($item->urls->first()) href="{{url($item->urls->first()->url)}}" @endif>
        <div class="produto__img">
            <img src="{{ thumb($item->main_image->source) }}" alt="Produto">
        </div>
    </a>
    <a class="produto__title" @if($item->urls->first()) href="{{url($item->urls->first()->url)}}" @endif>{{ $item->identification->first()->name }}</a>
    <p class="produto_sub">
        @if($item->extraFields->has('autor'))
        {{ $item->extraFields->get('autor')->values->first()->value }}
        @endif
    </p>
    <p class="produto__price">R$ {{ number_format($item->prices->first()->price, 2, ',', '.') }}</p>
</article>