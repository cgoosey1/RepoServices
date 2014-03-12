<?php namespace Repositories\Pokemon;

use Illuminate\Database\Eloquent\Model;
use \stdClass;

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
        return $this->convertFormat($this->pokemonModel->find($pokemonId));
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
            return $this->convertFormat($pokemon->first());
        }
        
        return null;
    }
    
    /**
    * Converting the Eloquent object to a standard format
    * 
    * @param mixed $pokemon
    * @return stdClass
    */
    protected function convertFormat($pokemon)
    {
        if ($pokemon == null)
        {
            return null;
        }
        
        $object = new stdClass();
        $object->id = $pokemon->id;
        $object->name = $pokemon->name;
        
        return $object;
    }
}
