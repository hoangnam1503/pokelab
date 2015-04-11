<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pokemon extends Model {

    use SoftDeletes;

    protected $table = 'pokemons';

    public function pokemonAbility() {
        return $this->hasMany('PokemonAbility');
    }

    public function pokemonMove() {
        return $this->hasMany('PokemonMove');
    }

    public function pokemonType() {
        return $this->hasMany('PokemonType');
    }
}
