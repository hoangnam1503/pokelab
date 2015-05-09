<?php
Route::get('/s', ['as' => 'search', 'uses' => 'HomeController@search']);

Route::get('/', 'HomeController@index');

Route::get('/pokedex/{id}', 'PokedexController@showPokemonDetail');

Route::get('/battle/type-chart', 'BattleController@showTypeChart');