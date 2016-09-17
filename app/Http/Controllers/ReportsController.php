<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Report;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ReportsController extends Controller
{
    /**
     * ReportsController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $title = 'Report';
        $reports = Auth::user()->reports;

        return view('reports.index', compact('reports', 'title'));
    }

    /**
     * @param Report $report
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit (Report $report) {
        $title = 'Edit Report';

        return view('reports.edit', compact('report', 'title'));
    }

    /**
     * @param StoreReportRequest $request
     * @param Report $report
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreReportRequest $request, Report $report) {
        $report->update($request->all());

        return redirect(action('ReportsController@index'));
    }

    /**
     * @param Report $report
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy (Report $report) {
        $report->delete();

        return(redirect('/report'));
    }
}