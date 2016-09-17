@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="text-center">Edit game</h2>

                {!! Form::model($game, ['method' => 'PATCH', 'action' => ['GamesController@update', $game->id]]) !!}

                @include('games._form_edit')

                {!! Form::close() !!}

{{--                @include('errors.list')--}}
            </div>
        </div>
    </div>
@endsection