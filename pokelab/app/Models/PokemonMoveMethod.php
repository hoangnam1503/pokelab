<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PokemonMoveMethod extends Model {

    use SoftDeletes;

    protected $table = 'pokemon_move_methods';

    public function pokemonMove() {
        return $this->hasMany('PokemonMove');
    }
}
