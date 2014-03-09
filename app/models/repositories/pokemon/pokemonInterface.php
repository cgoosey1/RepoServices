<?php namespace Repositories\Pokemon;

/**
 * A simple interface to set the methods in our Pokemon repository, nothing much happening here
 */
interface PokemonInterface
{
    public function getPokemonById($pokemonId);
    
    public function getPokemonByName($pokemonName);
}
