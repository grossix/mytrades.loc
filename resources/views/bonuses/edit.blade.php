@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="text-center">Edit bonus</h2>

                {!! Form::model($bonus, ['method' => 'PATCH', 'action' => ['BonusesController@update', $bonus->id]]) !!}

                @include('bonuses._form_edit')

                {!! Form::close() !!}

                {{--@include('errors.list')--}}
            </div>
        </div>
    </div>
@endsection