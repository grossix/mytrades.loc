@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">
                    Trades
                    @if($item->exists)
                        for {{ $item->name }} ({{ $item->abbr_condition }})
                    @endif
                    <span class="badge">{{ $trades->total() }}</span>
                </h2>
                <h3 class="text-center">Total earned: <span class="btn btn-success">{{ number_format($sum, 2) }}$</span></h3>
                {{--<div class="container">--}}
                    {{--<div class="row">--}}
                        {{--<div class="col-md-8 col-md-offset-2">--}}
                            @if(Auth::check())
                                @include('partials._popup_form', [
                                    'buttonName' => 'Add Trade',
                                    'controllerName' => 'TradesController',
                                    'formFolder' => 'trades'
                                ])
                            @endif

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                @include('trades._list')
                <div class="text-center">
                    {!! $trades->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection