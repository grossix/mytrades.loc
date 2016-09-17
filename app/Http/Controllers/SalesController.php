<?php

namespace App\Http\Controllers;

use Event;
use App\Events\OperationWasPublished;
use App\Game;
use App\Http\Requests\StoreSaleRequest;
use App\Sale;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    /**
     * SalesController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @param Game|null $game
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Game $game = null) {
        $title = 'Sales';

        $sum = Auth::user()->sales()->forGame($game)->with('game')->sum('profit');
        $sales = Auth::user()->sales()->forGame($game)->with('game')->latest()->paginate(9);
        $games = Game::orderBy('name')->lists('name', 'id');

        return view('sales.index', compact('sales', 'games', 'game', 'sum', 'title'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store (Request $request) {
        $sale = new Sale($request->all());
        Auth::user()->sales()->save($sale);

        Event::fire(new OperationWasPublished($sale->profit));

        return redirect('/sales');
    }

    /**
     * @param Sale $sale
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit (Sale $sale) {
        $title = 'Edit Sale';
        $games = Game::orderBy('name')->lists('name', 'id');

        return view('sales.edit', compact('sale', 'games', 'title'));
    }

    /**
     * @param StoreSaleRequest $request
     * @param Sale $sale
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreSaleRequest $request, Sale $sale) {
        $profitBefore = $sale->profit;
        $sale->update($request->all());

        Event::fire(new OperationWasPublished($sale->profit - $profitBefore));

        return redirect('/sales');
    }

    /**
     * @param Sale $sale
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy (Sale $sale) {
        Event::fire(new OperationWasPublished($sale->profit * (-1)));

        $sale->delete();

        return(redirect('/sales'));
    }
}
