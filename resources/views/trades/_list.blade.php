<div class="container">
    <div class="row">
    @forelse($trades as $trade)
        <div class="col-lg-6 trade">
            @include('partials._edit_buttons', [
                'className' => 'trade_buttons',
                'align' => 'pull-right',
                'controllerName' => 'TradesController',
                'item' => $trade
            ])
            <div class="clear"></div>
            <div class="trade_keys">
                <div class="block-item block-item-key item_quality_consumer_border tooltip_key">
                    <span class="trade_keys_amount">{{ $trade->item->keys }}</span>
                    <img src="http://steamcommunity-a.akamaihd.net/economy/image/-9a81dlWLwJ2UUGcVs_nsVtzdOEdtWwKGZZLQHTxDZ7I56KU0Zwwo4NUX4oFJZEHLbXX7gNTPcUxuxpJSXPbQv2S1MDeXkh6LBBOie3rKFRh16PKd2pDvozixtSOwaP2ar7SlzIA6sEo2rHCpdyhjAGxr0A6MHezetG0RZXdTA"
                         alt="Keys" class="trade_keys_image">

                    <span class="tooltip_key_content">
                        <div class="item_name">
                            {{ $trade->item->keys }} x Chroma 2 Keys<br>
                            <span class="item_quality_consumer_text">Consumer</span><br>
                            $2.49
                        </div>
                    </span>
                </div>
            </div>


            <i class="fa fa-angle-right fa-5x" aria-hidden="true"></i>


            @include('items._item', ['item' => $trade->item, 'itemPrice' => ($trade->profit + 2.49 * $trade->item->keys)])


            <i class="fa fa-angle-right fa-5x" aria-hidden="true"></i>


            {{--<div class="trade_profit">--}}
                {{--+ {{ $trade->profit }}$--}}
            {{--</div>--}}

            <div class="btn btn-lg btn-success btn_trade_profit">
                +{{ number_format($trade->profit, 2) }}$
            </div>

            <div class="trade_date">
                <p class="pull-right">{{ $trade->created_at->format('jS F Y H:i') }}</p>

            </div>
            <div class="clear"></div>
            <hr>
        </div>
        {{--<div class="clear"></div>--}}
    @empty
        <p>No Trades at the moment</p>
    @endforelse
    </div>
</div>


@push('scripts')
    {{ Html::script('js/tooltipster.bundle.min.js') }}

    <script>
        $(document).ready(function() {
            $('.tooltip').tooltipster({
                functionInit: function(instance, helper){
                    var content = $(helper.origin).find('.tooltip_content').detach();
                    instance.content(content);
                },
                animation: 'fade',
                delay: 100,
                theme: 'tooltipster-light'
            });

            $('.tooltip_key').tooltipster({
                functionInit: function(instance, helper){
                    var content = $(helper.origin).find('.tooltip_key_content').detach();
                    instance.content(content);
                },
                animation: 'fade',
                delay: 100,
                theme: 'tooltipster-light'
            });

        });
    </script>
@endpush