<?php

namespace App\Http\Controllers;

use Event;
use App\Condition;
use App\Events\OperationWasPublished;
use App\Http\Requests\StoreTradeRequest;
use App\Item;
use App\Trade;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TradesController extends Controller
{
    /**
     * TradesController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @param Item $item
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Item $item = null) {
        $title = 'Trades';
        $sum = Auth::user()->trades()->forItem($item)->with('item')->sum('profit');
        $trades = Auth::user()->trades()->forItem($item)->with('item')->latest()->paginate(10);
        $items = Item::all(array('name', 'stattrak', 'condition_id', 'id', 'keys'));
        $itemsGroups = $items->groupBy('keys');
        $itemz = array();
        foreach ($itemsGroups as $itemsGroup => $items) {
            $itemz[$itemsGroup . ' keys'] = $items->pluck('name', 'id')->toArray();
        }

        return view('trades.index', compact('trades', 'itemz', 'sum', 'item', 'title'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store (Request $request) {
        $trade = new Trade($request->all());
        $trade->keys = Item::where('id', $trade->item_id)->first()->keys;
        $trade->profit = $trade->profit - (2.49 * $trade->keys);
        Auth::user()->trades()->save($trade);
        //something do here request->keys, request->profit, then trade - new - save

        Event::fire(new OperationWasPublished($trade->profit));

        return redirect('trades');
    }

    /**
     * @param Trade $trade
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param Bonus $bonus
     */
    public function edit (Trade $trade) {
        $title = 'Edit Trade';
        $items = Item::all(array('name', 'stattrak', 'condition_id', 'id', 'keys'));
        $itemsGroups = $items->groupBy('keys');
        $itemz = array();
        foreach ($itemsGroups as $itemsGroup => $items) {
            $itemz[$itemsGroup . ' keys'] = $items->pluck('name', 'id')->toArray();
        }

        return view('trades.edit', compact('trade', 'itemz', 'title'));
    }

    /**
     * @param StoreTradeRequest $request
     * @param Trade $trade
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @internal param Bonus $bonus
     */
    public function update(StoreTradeRequest $request, Trade $trade) {
        $profitBefore = $trade->profit;
        $trade->update($request->all());

        Event::fire(new OperationWasPublished($trade->profit - $profitBefore));

        return redirect(action('TradesController@index'));
    }

    /**
     * @param Trade $trade
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy (Trade $trade) {
        Event::fire(new OperationWasPublished($trade->profit * (-1)));

        $trade->delete();

        return(redirect('/trades'));
    }
}
