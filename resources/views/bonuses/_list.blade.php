<div class="container">
    <div class="row">
        <div class="col-md-12">
            @forelse($bonuses as $bonus)
                <div class="bonus {{ $bonus->profit > 0 ? 'bg-success' : 'bg-danger' }} ">
                    @if($bonus->description != '')
                        <div class="bonus_description">
                            @include('partials._edit_buttons', [
                                'className' => 'bonus_buttons pull-right',
                                'align' => 'pull-right',
                                'controllerName' => 'BonusesController',
                                'item' => $bonus
                            ])

                            {{ $bonus->description }}

                        </div>
                    @endif
                    <br>
                    <div class="bonus_posted pull-left">
                        <br>
                        <i><span>Posted {{ $bonus->created_at->format('jS F Y H:i') }}</span></i>
                    </div>
                    <div class="bonus_profit pull-right">
                        <strong>Profit:</strong>
                        <button class="btn {{ $bonus->profit > 0 ? 'btn-success' : 'btn-danger' }}">
                            {{ number_format($bonus->profit, 2) }}$
                        </button>
                    </div>
                    <div class="clear"></div>
                </div>
            @empty
                <p>No Bonuses at the moment</p>
            @endforelse
        </div>
    </div>
</div>
