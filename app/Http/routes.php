<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/', 'UsersController@index');

Route::auth();

Route::get('/', 'UsersController@index');

//Route::get('logs', 'LogsController@index');

Route::get('report', 'ReportsController@index');
Route::get('report/{report}/edit', 'ReportsController@edit');
Route::patch('report/{report}', 'ReportsController@update');
Route::delete('report/{report}', 'ReportsController@destroy');


Route::get('items', 'ItemsController@index');
Route::post('items', 'ItemsController@store');
Route::get('item/{item}', 'TradesController@index');
Route::patch('item/{item}', 'ItemsController@update');
Route::get('items/{item}/edit', 'ItemsController@edit');
Route::patch('items/{item}', 'ItemsController@update');
Route::delete('items/{item}', 'ItemsController@destroy');

//Route::get('cards', 'CardsController@index');
//Route::post('cards', 'CardsController@store');
//Route::patch('cards/{cards}', 'CardsController@update');

Route::get('sales', 'SalesController@index');
Route::post('sales', 'SalesController@store');
Route::get('sales/{sale}/edit', 'SalesController@edit');
Route::patch('sales/{sale}', 'SalesController@update');
Route::delete('sales/{sale}', 'SalesController@destroy');

//Route::patch('sales/{sales}', 'SalesController@update');

Route::get('trades', 'TradesController@index');
Route::post('trades', 'TradesController@store');
Route::get('trades/{trade}/edit', 'TradesController@edit');
Route::patch('trades/{trade}', 'TradesController@update');
Route::delete('trades/{trade}', 'TradesController@destroy');


Route::get('bonuses', 'BonusesController@index');
Route::post('bonuses', 'BonusesController@store');
Route::get('bonuses/{bonus}/edit', 'BonusesController@edit');
Route::patch('bonuses/{bonus}', 'BonusesController@update');
Route::delete('bonuses/{bonus}', 'BonusesController@destroy');


Route::get('games', 'GamesController@index');
Route::get('game/{game}', 'SalesController@index');
Route::post('games', 'GamesController@store');
Route::get('games/{game}/edit', 'GamesController@edit');
Route::patch('games/{game}', 'GamesController@update');
Route::delete('games/{game}', 'GamesController@destroy');
//Route::patch('game/{game}', 'GamesController@update');

Route::get('dashboard', 'UsersController@index');