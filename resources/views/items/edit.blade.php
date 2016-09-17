@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="text-center">Edit item</h2>

                {!! Form::model($item, ['method' => 'PATCH', 'action' => ['ItemsController@update', $item->id]]) !!}

                @include('items._form_edit')

                {!! Form::close() !!}

                {{--@include('errors.list')--}}
            </div>
        </div>
    </div>
@endsection
