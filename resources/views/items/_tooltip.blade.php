<span class="tooltip_content">
    <div class="item_name">
        @if($item->stattrak)
            <span class="item_name item_stattrak_name">Stattrak</span><br>
        @endif
        {{ $item->name }}<br>
        @unless($item->isCase())
            ({{ $item->condition->name }})<br>
        @endunless
        <span class="item_quality_{{ strtolower($item->quality->name) }}_text">{{ $item->quality->name }}</span><br>
        ${{ isset($itemPrice) ? number_format($itemPrice, 2) : number_format($item->price, 2) }}
    </div>
</span>