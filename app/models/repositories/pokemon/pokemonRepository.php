<?php namespace Repositories\Pokemon;

use Illuminate\Database\Eloquent\Model;

/**
* Our pokemon repository, containing commonly used queries
*/
class PokemonRepository implements PokemonInterface
{
    // Our Eloquent pokemon model
    protected $pokemonModel;
    
    /**
    * Setting our class $pokemonModel to the injected model
    * 
    * @param Model $pokemon
    * @return PokemonRepository
    */
    public function __construct(Model $pokemon)
    {
        $this->pokemonModel = $pokemon;
    }

    /**
    * Returns the pokemon object associated with the passed id
    * 
    * @param mixed $pokemonId
    * @return Model
    */
    public function getPokemonById($pokemonId)
    {
        return $this->pokemonModel->find($pokemonId);
    }

    /**
    * Returns the pokemon object associated with the pokemonName
    * 
    * @param string $pokemonName
    */
    public function getPokemonByName($pokemonName)
    {
        // Search by name
        $pokemon = $this->pokemonModel->where('name', strtolower($pokemonName));
        
        if ($pokemon) 
        {
            // Return first found row
            return $pokemon->first();
        }
        
        return null;
    }
}
