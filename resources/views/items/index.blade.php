@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="text-center">
                    Items
                    <span class="badge">{{ $items->count() }}</span>
                </h2>

                @if(Auth::check())
                    @include('partials._popup_form', [
                        'buttonName' => 'Add Item',
                        'controllerName' => 'ItemsController',
                        'formFolder' => 'items'
                    ])
                @endif

                @include('items._list')
            </div>
        </div>
    </div>
@endsection

