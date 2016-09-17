@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">
                    Sales
                    @if($game->exists)
                        for {{ $game->name }}
                    @endif
                    <span class="badge">{{ $sales->total() }}</span>
                </h2>
                <h3 class="text-center">Total earned: <span class="btn btn-success">{{ number_format($sum, 2) }}$</span></h3>
                @if($game->exists)
                    <img src="{{ $game->image }}" alt="{{ $game->name }}" class="center-block img-thumbnail">
                @endif

                @if(Auth::check())
                    @include('partials._popup_form', [
                        'buttonName' => 'Add Sale',
                        'controllerName' => 'SalesController',
                        'formFolder' => 'sales'
                    ])
                @endif

                @include('sales._list')
                <div class="text-center">
                    {!! $sales->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
