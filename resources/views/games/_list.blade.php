@forelse($games->chunk(2) as $gamesChunked)
    <div class="row">
        @foreach($gamesChunked as $game)
            <div class="game col-md-6">
                @include('partials._edit_buttons', [
                    'className' => 'game_buttons',
                    'align' => 'pull-right',
                    'controllerName' => 'GamesController',
                    'item' => $game
                ])
                <div class="game_name text-center"><strong>
                    <a href="{{ action('SalesController@index', $game->id) }}" >{{ $game->name }}</a></strong>
                    <span class="badge">{{ count($game->sales) }}</span>
                    <span class="btn btn-xs btn-success">{{ $game->sales->sum('profit') }}$</span>
                </div>

                <a href="{{ action('SalesController@index', $game->id) }}">
                    <img src="{{ $game->image }}" alt="{{ $game->name }}" width="465px" height="215px" class="game_image center-block">
                </a>
                <br><br>
            </div>
        @endforeach
    </div>

@empty
    <p>No games at the moment );</p>
@endforelse

<div class="text-center">
    {!! $games->links() !!}
</div>