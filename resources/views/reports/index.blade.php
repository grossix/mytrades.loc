@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2 class="text-center">Report table</h2>
                <br>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Keys</th>
                        <th>Money</th>
                        <th>Date</th>
                        <th>Description</th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <th scope="row" data-toggle="tooltip" title="{{ $report->keys * 2.49 }}$">
                                    {{ $report->keys }}
                                    <i class="fa fa-key"></i>
                                </th>
                                <td>{{ number_format($report->money, 2) }}$</td>
                                <td>{{ $report->created_at->format('d.m.Y') }}<span class="text-muted report_hours"> ({{ $report->created_at->format('H:i') }})</span></td>
{{--                                <td>{{ $report->created_at->format('d.m.Y') }}</td>--}}
                                <td>{{ $report->description }}
                                    @include('partials._edit_buttons', [
                                        'className' => 'report_buttons',
                                        'align' => 'pull-right',
                                        'controllerName' => 'ReportsController',
                                        'item' => $report
                                    ])
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
