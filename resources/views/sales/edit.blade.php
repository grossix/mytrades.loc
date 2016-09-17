@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="text-center">Edit sale</h2>

                {!! Form::model($sale, ['method' => 'PATCH', 'action' => ['SalesController@update', $sale->id]]) !!}

                @include('sales._form_edit')

                {!! Form::close() !!}

{{--                @include('errors.list')--}}
            </div>
        </div>
    </div>
@endsection