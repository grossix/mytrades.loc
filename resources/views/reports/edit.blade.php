@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="text-center">Edit report</h2>

                {!! Form::model($report, ['method' => 'PATCH', 'action' => ['ReportsController@update', $report->id]]) !!}

                @include('reports._form')

                {!! Form::close() !!}

                {{--@include('errors.list')--}}
            </div>
        </div>
    </div>
@endsection