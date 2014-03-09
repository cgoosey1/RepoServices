<?php namespace Services\Pokemon;

use Repositories\Pokemon\PokemonInterface;

/**
* Our PokemonService, containing all useful methods for business logic around Pokemon
*/
class PokemonService
{
    // Containing our pokemonRepository to make all our database calls to
    protected $pokemonRepo;
    
    /**
    * Loads our $pokemonRepo with the actual Repo associated with our pokemonInterface
    * 
    * @param pokemonInterface $pokemonRepo
    * @return PokemonService
    */
    public function __construct(pokemonInterface $pokemonRepo)
    {
        $this->pokemonRepo = $pokemonRepo;
    }

    /**
    * Method to get pokemon based either on name or ID
    * 
    * @param mixed $pokemon
    * @return string
    */
    public function getPokemon($pokemon)
    {
        // If pokemon variable is numeric, assume ID
        if (is_numeric($pokemon))
        {
            // Get pokemon based on ID
            $pokemon = $this->pokemonRepo->getPokemonById($pokemon);
        }
        else 
        {
            // Since not numeric, lets try get the pokemon based on Name
            $pokemon = $this->pokemonRepo->getPokemonByName($pokemon);
        }
        
        // If Eloquent Object returned (rather than null) return the name of the pokemon
        if ($pokemon != null)
        {
            return $pokemon->name;
        }

        // If nothing found, return this simple string
        return 'Pokemon Not Found';
    }
}
