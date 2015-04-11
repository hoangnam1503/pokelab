<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model {

    use SoftDeletes;

    protected $table = 'types';

    public function pokemonType() {
        return $this->hasMany('PokemonType');
    }
}
