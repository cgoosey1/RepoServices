<?php namespace Services\Pokemon;

use Illuminate\Support\ServiceProvider;

/**
* Register our pokemon service with Laravel
*/
class PokemonServiceServiceProvider extends ServiceProvider 
{
    /**
    * Registers the service in the IoC Container
    * 
    */
    public function register()
    {
        // Binds 'pokemonService' to the result of the closure
        $this->app->bind('pokemonService', function($app)
        {
            return new PokemonService(
                // Inject in our class of pokemonInterface, this will be our repository
                $app->make('Repositories\Pokemon\PokemonInterface')
            );
        });
    }
}
