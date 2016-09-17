<?php

namespace App\Http\Controllers;

use App\Bonus;
use App\Game;
use App\Item;
use App\Sale;
use App\Trade;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * UsersController constructor.
     */
    public function __construct() {
        return $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $title = $user->name;

        $itemsCount = Item::all()->count();
        $trades = Trade::orderBy('profit', 'desc')->take(4)->get();

        $gamesCount = Game::all()->count();
        $sales = Sale::orderBy('profit', 'desc')->take(3)->get();

        $bonuses = Bonus::orderBy('profit', 'desc')->take(3)->get();

        /*
         * the Auth::user() function returns the same user object every time you use it.
         * It does not go back to the database every time to get the user again.
         * So the first time you call Auth::user()->polls, it will query the database to get their polls.
         * Then the rest of the times you call it, you are retrieving the polls from the object
         * (the object keeps the polls data on its model).
         * So this may not be a big issue as it only requires one database call to get the polls no matter how many times you use it.
         * To answer the question of how you would do this though:
         * The Auth facade returns an object of class Illuminate\Auth\Guard.
         * You would need to create a new class that extends that, then over-write the user() method to retrieve the user with the polls.
         * You can check out that class to learn more about how it works,
         * Taylor is very good about commenting the code and showing you what is going on so you can change if needed.
         */
        return view('users.index', compact('user', 'title', 'itemsCount', 'trades', 'gamesCount', 'sales', 'bonuses'));
    }
}
