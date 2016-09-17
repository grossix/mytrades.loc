<?php

namespace App\Http\Controllers;

use App\Condition;
use App\Http\Requests\StoreItemRequest;
use App\Item;
use App\Quality;
use App\Type;
use Illuminate\Http\Request;

use App\Http\Requests;

class ItemsController extends Controller
{
    /**
     * ItemsController constructor.
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $title = 'Items';
        $items = Item::orderBy('keys', 'asc')->get();
        $keysCurrent = 1;
//        $items[0]['keys'];

        return view('items.index', compact('items', 'keysCurrent', 'title'));
    }

    public function store(Request $request) {
//        I am doing validation here, not via Request file because we should get rid of useless get parameters like $l
        $this->validate($request,
            ['link' => 'required|url|unique:items'],
            ['link.unique' => 'Hey, we already have this item in our storage!']
        );

        $item = $this->fetchUrlToItemObject($request['link']);
        $item->save();

        return(redirect('/items'));
    }

    /**
     * @param Item $item
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit (Item $item) {
        $title = 'Edit Item';
        $conditions = Condition::lists('name', 'id');
        $qualities = Quality::lists('name', 'id');
        $types = Type::lists('name', 'id');

        return view('items.edit', compact('item', 'conditions', 'qualities', 'types', 'title'));
    }

    /**
     * @param StoreItemRequest $request
     * @param Item $item
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(StoreItemRequest $request, Item $item) {
        $item->update($request->all());

        return redirect(action('ItemsController@index'));
    }

    /**
     * @param Item $item
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy (Item $item) {
        $item->delete();

        return redirect(action('ItemsController@index'));
    }

    /**
     * @param $url
     * @return Item
     */
    private function fetchUrlToItemObject($url) {
        $url .= '/render?start=0&count=1&currency=1&language=english&format=json';

        $urlToArray = explode(addslashes("/"), $url);
        $gameId = $urlToArray[array_search('listings', $urlToArray) + 1];

        $results = json_decode(utf8_encode(file_get_contents($url)), true);
        $item = new Item();
        $item->link = $url;
        $item->price = $this->getPriceReserve($results);
        $item->keys = $this->getKeysReserve($results);

        $step = $results['assets'][$gameId];
        $step = $step[array_keys($step)[0]];
        $step = $step[array_keys($step)[0]];
        $pre_image = 'http://steamcommunity-a.akamaihd.net/economy/image/';


        $item->name = str_ireplace('StatTrak™ ', '', $step['name'], $counter);

        if($counter == 1)
            $item->stattrak = true;
        else
            $item->stattrak = false;

        $item->image = $pre_image . $step['icon_url'];

        if($this->isCase($item->name)) {
            $item->condition_id = Condition::where('name', 'Factory New')->firstOrFail()->id;

            $item->quality_id = Quality::where('name', 'Consumer')->firstOrFail()->id;

            $item->type_id = Type::where('name', 'Case')->firstOrFail()->id;
        } else {
            $item->condition_id = $this->getCondition($step['market_name']);

            $item->quality_id = $this->getQuality($step['type']);

            $item->type_id = $this->getType($step['type']);
        }



//        $item->price = $this->getPrice('http://steamcommunity.com/market/priceoverview/?currency=1&appid=730&market_hash_name=' . urlencode($step['market_name']));
//        $item->keys = $this->getKeys('http://steamcommunity.com/market/priceoverview/?currency=1&appid=730&market_hash_name=' . urlencode($step['market_name']));
        return $item;
    }

    /**
     * @param $itemName
     * @return int
     */
    private function getCondition($itemName) {
        $itemCondition = substr($itemName, strrpos($itemName, '(') + 1, strlen($itemName) - strrpos($itemName, '(') - 2);
        return Condition::where('name', $itemCondition)->firstOrFail()->id;
    }

    /**
     * @param $itemName
     * @return int
     */
    private function getQuality($itemName) {
        $itemName = str_ireplace(['★ ', 'StatTrak™ ', 'Grade '], '', $itemName);

        $itemNameToWords = explode(' ', $itemName);
        $itemQuality = $itemNameToWords[0];

        return Quality::where('name', $itemQuality)->firstOrFail()->id;
    }

    /**
     * @param $itemName
     * @return int
     */
    private function getType($itemName) {
        $itemName = str_ireplace(['★ ', 'StatTrak™ ', 'Grade '], '', $itemName);

        $beginPosition = strpos($itemName, ' ');
        $itemType = substr($itemName, $beginPosition + 1);

        return Type::where('name', $itemType)->firstOrFail()->id;
    }

    /**
     * @param $step
     * @return string
     */
    private function getPrice($step) {
        $step = json_decode(utf8_encode(file_get_contents($step)), true);
        $itemPrice = substr($step['lowest_price'], 1);
        return $itemPrice;
    }

    /**
     * @param $results
     * @return float
     */
    private function getPriceReserve($results) {
        $step = $results['listinginfo'];
        $step = $step[array_keys($step)[0]];
        $itemPrice = ($step['converted_price'] + $step['converted_fee']) / 100;
        return $itemPrice;
    }

    /**
     * @param $step
     * @return int
     */
    private function getKeys($step) {
        $keyPrice = 2.49;
        $itemPrice = $this->getPrice($step);
        if($itemPrice <= $keyPrice)
            return 1;
        $keysAmount = floor($itemPrice/$keyPrice);

        return $keysAmount;
    }

    /**
     * @param $results
     * @return float|int
     */
    private function getKeysReserve($results) {
        $keyPrice = 2.49;
        $itemPrice = $this->getPriceReserve($results);
        if($itemPrice <= $keyPrice)
            return 1;
        $keysAmount = floor($itemPrice/$keyPrice);

        return $keysAmount;
    }

    /**
     * @param $name
     * @return bool
     */
    private function isCase($name) {
        $nameArr = explode(' ', $name);
        return ($nameArr[count($nameArr) - 1] == 'Case');
    }


}
