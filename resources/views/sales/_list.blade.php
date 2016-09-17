<div class="container">
    @forelse($sales->chunk(3) as $salesChunked)
        <div class="row">
            @foreach($salesChunked as $sale)
                <div class="col-lg-4 col-md-6 col-sm-6 sale">

                    <a href="/game/{{ $sale->game->id }}">
                        <img class="sale_background_image img-rounded center-block"
                             src="{{ $sale->game->image }}"
                             alt="{{ $sale->game->name }}"
                             width="307"
                             height="143"
                        >
                    </a>
                    <div class="sale_big_profit">
                        <a href="/game/{{ $sale->game->id }}" class="sale_big_profit_link">+{{ number_format($sale->profit, 2) }}$</a>
                    </div>
                    @include('partials._edit_buttons', [
                        'className' => 'sale_buttons',
                        'align' => 'pull-right',
                        'controllerName' => 'SalesController',
                        'item' => $sale
                    ])
                    <div class="sale_content">
                        <div class="sale_game">
                            <p><strong>Game:</strong> <a href="/game/{{ $sale->game->id }}">{{ $sale->game->name }}</a></p>
                        </div>
                        <div class="sale_profit">
                            <p><strong>Profit:</strong> {{ number_format($sale->profit, 2) }}$</p>
                        </div>
                        @if($sale->description != '')
                            <div class="sale_description">
                                {{ $sale->description }}
                            </div>
                        @endif
                        <p><strong>Posted</strong> {{ $sale->created_at->format('j F Y H:i') }}</p>
                    </div>

                </div>
            @endforeach
        </div>
    @empty
        <p>No Sales at the moment</p>
    @endforelse
</div>