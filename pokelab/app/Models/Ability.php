<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ability extends Model {

    use SoftDeletes;

    protected $table = 'abilities';

    public function pokemonAbility() {
        return $this->hasMany('PokemonAbillity');
    }

    public function generation() {
        return $this->hasOne('Generation');
    }
}
