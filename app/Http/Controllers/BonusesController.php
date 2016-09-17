<?php

namespace App\Http\Controllers;

use App\Bonus;
use Event;
use App\Events\OperationWasPublished;
use App\Http\Requests\StoreBonusRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class BonusesController extends Controller
{
    /**
     * BonusesController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $title = 'Bonuses';
        $sum = Auth::user()->bonuses()->sum('profit');
        $bonuses =  Auth::user()->bonuses()->latest()->paginate(10);

        return view('bonuses.index', compact('bonuses', 'sum', 'title'));
    }

    /**
     * @param StoreBonusRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store (StoreBonusRequest $request) {
        $bonus = new Bonus($request->all());
        Auth::user()->bonuses()->save($bonus);

        Event::fire(new OperationWasPublished($bonus->profit));

        return redirect('/bonuses');
    }

    /**
     * @param Bonus $bonus
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit (Bonus $bonus) {
        $title = 'Edit Bonus';

        return view('bonuses.edit', compact('bonus', 'title'));
    }

    /**
     * @param StoreBonusRequest $request
     * @param Bonus $bonus
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreBonusRequest $request, Bonus $bonus) {
        $profitBefore = $bonus->profit;

        $bonus->update($request->all());

        Event::fire(new OperationWasPublished($bonus->profit - $profitBefore));

        return redirect(action('BonusesController@index'));
    }

    public function destroy (Bonus $bonus) {
        Event::fire(new OperationWasPublished($bonus->profit * (-1)));

        $bonus->delete();

        return(redirect('/bonuses'));
    }
}
