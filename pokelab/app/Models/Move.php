<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Move extends Model {

    use SoftDeletes;

    protected $table = 'moves';

    public function type() {
        return $this->belongsTo('Type');
    }

    public function damageClass() {
        return $this->belongsTo('DamageClass');
    }

    public function moveEffect() {
        return $this->hasMany('MoveEffect');
    }

    public function pokemonMove() {
        return $this->hasMany('PokemonMove');
    }
}
