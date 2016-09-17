@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="text-center">Edit trade</h2>

                {!! Form::model($trade, ['method' => 'PATCH', 'action' => ['TradesController@update', $trade->id]]) !!}

                @include('trades._form_edit')

                {!! Form::close() !!}

{{--                @include('errors.list')--}}
            </div>
        </div>
    </div>
@endsection