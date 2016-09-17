@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">User page :: {{$user->name}}</h2>
                <br>
                <table class="user_info_table table table-striped">
                    <tr>
                        <td class="col-md-1"><i class="fa fa-key"></i></td>
                        <td class="col-md-10"><a href="{{ action('ReportsController@index') }}">Keys</a></td>
                        <td class="col-md-1">
                            <a href="{{ action('ReportsController@index') }}">
                                <span class="label label-success">{{ $user->keys }} <i class="fa fa-key"></i></span>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-dollar"></i></td>
                        <td><a href="{{ action('ReportsController@index') }}">Money</a></td>
                        <td><a href="{{ action('ReportsController@index') }} " >
                                <span class="label label-success">{{ number_format($user->money, 2) }}$</span>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-dollar"></i></td>
                        <td><a href="{{ action('ReportsController@index') }}">Total Earned Money</a></td>
                        <td><a href="{{ action('ReportsController@index') }}">
                                <span class="label label-success">{{ number_format(($user->keys * 2.49) + $user->money, 2) }}$</span>
                            </a>
                        </td>
                    </tr>


                    <tr>
                        <td><i class="fa fa-exchange"></i></td>
                        <td><a href="{{ url('/items') }}">Items</a></td>
                        <td><a href="{{ url('/items') }}">
                                <span class="label label-success">{{ $itemsCount }}</span>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-exchange"></i></td>
                        <td><a href="{{ action('TradesController@index') }}">Trades</a></td>
                        <td><a href="{{ action('TradesController@index') }}">
                                <span class="label label-success">{{ count($user->trades) }}</span>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-exchange"></i></td>
                        <td><a href="{{ action('TradesController@index') }}">Total Earned From Trades</a></td>
                        <td><a href="{{ action('TradesController@index') }}">
                                <span class="label label-success">{{ number_format($user->trades->sum('profit'), 2) }}$</span>
                            </a>
                        </td>
                    </tr>


                    <tr>
                        <td><i class="fa fa-money"></i></td>
                        <td><a href="{{ url('/games') }}">Games</a></td>
                        <td><a href="{{ url('/games') }}">
                                <span class="label label-success">{{ $gamesCount }}</span>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-money"></i></td>
                        <td><a href="{{ url('/sales') }}">Sales</a></td>
                        <td><a href="{{ url('/sales') }}">
                                <span class="label label-success">{{ count($user->sales) }}</span>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-money"></i></td>
                        <td><a href="{{ url('/sales') }}">Total Earned From Sales</a></td>
                        <td><a href="{{ url('/sales') }}">
                                <span class="label label-success">{{ number_format($user->sales->sum('profit'), 2) }}$</span>
                            </a>
                        </td>
                    </tr>


                    <tr>
                        <td><i class="fa fa-certificate"></i></td>
                        <td><a href="{{ action('BonusesController@index') }}">Bonuses</a></td>
                        <td><a href="{{ action('BonusesController@index') }}">
                                <span class="label label-success">{{ count($user->bonuses) }}</span>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td><i class="fa fa-certificate"></i></td>
                        <td><a href="{{ action('BonusesController@index') }}">Total Earned From Bonuses</a></td>
                        <td><a href="{{ action('BonusesController@index') }}">
                                <span class="label label-success">{{ number_format($user->bonuses->sum('profit'), 2) }}$</span>
                            </a>
                        </td>
                    </tr>
                </table>

                <h2 class="text-center user_heading">Most profitable trades</h2>
                @include('trades._list')

                <h2 class="text-center user_heading">Most profitable cards sales</h2>
                @include('sales._list')

                <hr>

                <h2 class="text-center user_heading">Most profitable bonuses</h2>
                @include('bonuses._list')
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    {{ Html::script('js/tooltipster.bundle.min.js') }}
    {{ Html::script('js/jquery.bootstrap-touchspin.js') }}

    <script>
        $(document).ready(function() {
            $('.tooltip').tooltipster({
                functionInit: function (instance, helper) {
                    var content = $(helper.origin).find('.tooltip_content').detach();
                    instance.content(content);
                },
                animation: 'fade',
                delay: 100,
                theme: 'tooltipster-light'
//                minWidth: 180
            });
            $('.tooltip_key').tooltipster({
                functionInit: function (instance, helper) {
                    var content = $(helper.origin).find('.tooltip_key_content').detach();
                    instance.content(content);
                },
                animation: 'fade',
                delay: 100,
                theme: 'tooltipster-light'
//                minWidth: 180
            });
        });
    </script>
@endsection