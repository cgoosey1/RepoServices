<?php namespace Repositories\Pokemon;

use Entities\Pokemon;
use Repositories\Pokemon\PokemonRepository;
use Illuminate\Support\ServiceProvider;

/**
* Register our Repository with Laravel
*/
class PokemonRepositoryServiceProvider extends ServiceProvider 
{
    /**
    * Registers the pokemonInterface with Laravels IoC Container
    * 
    */
    public function register()
    {
        // Bind the returned class to the namespace 'Repositories\PokemonInterface
        $this->app->bind('Repositories\Pokemon\PokemonInterface', function($app)
        {
            return new PokemonRepository(new Pokemon());
        });
    }
}
