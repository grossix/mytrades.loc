@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">
                    Games
                    <span class="badge">{{ $games->total() }}</span>
                </h2>
                {{--@if(count($cards) == 0)--}}
                @if(Auth::check())
                    @include('partials._popup_form', [
                        'buttonName' => 'Add Game',
                        'controllerName' => 'GamesController',
                        'formFolder' => 'games'
                    ])
                @endif

                @include('games/_list')

            </div>
        </div>
    </div>
@endsection
