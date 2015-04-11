<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PokemonAbility extends Model {

    use SoftDeletes;

    protected $table = 'pokemon_abilities';

    public function ability() {
        return $this->belongsTo('Ability');
    }

    public function pokemon() {
        return $this->belongsTo('Pokemon');
    }
}
