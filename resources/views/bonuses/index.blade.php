@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Bonuses <span class="badge">{{ $bonuses->total() }}</span></h2>
                <h3 class="text-center">Total earned: <span class="btn btn-success">{{ number_format($sum, 2) }}$</span></h3>
                @if(Auth::check())
                    @include('partials._popup_form', [
                        'buttonName' => 'Add Bonus',
                        'controllerName' => 'BonusesController',
                        'formFolder' => 'bonuses'
                    ])
                @endif

                @include('bonuses._list')
                <div class="text-center">
                    {!! $bonuses->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection