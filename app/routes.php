<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

// A nice simple route to show a pokemons name if we can find it using our Service
Route::any('/pokemon/{pokemon}', function($pokemon) {
    return Pokemon::getPokemon($pokemon);
});
