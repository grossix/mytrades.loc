@forelse($items as $item)
    @if($item->keys > $keysCurrent)
        <?php $keysCurrent = $item->keys; ?>
        <h3>{{ $keysCurrent }} keys</h3>
    @endif

    <div class="item_main">
        <div class="item_stats text-center">
            <a href="/item/{{ $item->id }}" class=""><span class="badge"> {{ count($item->trades) }}</span></a>
            <a href="/item/{{ $item->id }}" class="btn btn-xs btn-success">{{ number_format($item->trades->sum('profit'), 2) }}$</a>
        </div>

        @include('items._item')
        {{--<div class="item_buttons pull-right">--}}

        @include('partials._edit_buttons', [
            'className' => 'item_buttons',
            'align' => 'text-center',
            'controllerName' => 'ItemsController',
            'item' => $item
        ])

    </div>
@empty
    <p>No Items at the moment</p>
@endforelse


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
        });
    </script>
@endpush