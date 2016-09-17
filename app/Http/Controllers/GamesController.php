<?php

namespace App\Http\Controllers;

use App\Game;
use App\Http\Requests\StoreGameRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use Symfony\Component\DomCrawler\Crawler;

class GamesController extends Controller
{
    /**
     * GamesController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $title = 'Games';
        $games = Game::latest()->paginate(10);

        return view('games.index', compact('games', 'title'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        $request['link'] = str_ireplace(['?l=russian'], '', $request['link']);

//        I am doing validation here, not via Request file because we should get rid of useless get parameters like $l
        $this->validate($request,
            ['link' => 'required|url|unique:games'],
            ['link.unique' => 'Hey, this game is already in our library! There is no reason to add it again (:']
        );

        $game = $this->fetchUrlToGameObject($request['link']);

        $game->save();

        return(redirect('/games'));
    }

    /**
     * @param Game $game
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit (Game $game) {
        $title = 'Edit Game';

        return view('games.edit', compact('game', 'title'));
    }

    /**
     * @param StoreGameRequest $request
     * @param Game $game
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreGameRequest $request, Game $game) {
        $game->update($request->all());

        return redirect(action('GamesController@index'));
    }

    /**
     * @param Game $game
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy (Game $game) {
        $game->delete();

        return(redirect('\games'));
    }

    /**
     * @param $url
     * @return Game
     */
    private function fetchUrlToGameObject($url) {
        $urlToArray = explode(addslashes("/"), $url);

        $game = new Game();
        $game->link = $url;
        $game->gameid = $urlToArray[array_search('app', $urlToArray) + 1];
        $html = file_get_contents($url);
        $crawler = new Crawler($html);

        if ($crawler->filter('.agegate_img_app')->count()) {
            $game->name = str_ireplace(array(' on Steam', 'в Steam'), '', $crawler->filter('title')->text());
            $game->image = $crawler->filter('.agegate_img_app')->attr('src');
        } else {
            $game->name = $crawler->filter('.apphub_AppName')->text();
            $game->image = $crawler->filter('.game_header_image_full')->attr('src');
        }

        return $game;
    }

}
