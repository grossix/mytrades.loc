<div class="block-item item_quality_{{ strtolower($item->quality->name) }}_border tooltip">
    @if($item->stattrak)
        <div class="stattrak_logo">ST</div>
    @endif
    @unless($item->isCase())
        <div class="condition_logo">{{ $item->abbr_condition }}</div>
    @endunless
    <a href="/item/{{ $item->id }}">
        <img src="{{ $item->image }}"
             alt="{{ $item->name }}"
             class="item_image"
        >
    </a>
    <div class="price_logo">$
		{{ isset($itemPrice) ? number_format($itemPrice, 2) : number_format($item->price, 2) }}
	</div>
    @include('items._tooltip')
</div>