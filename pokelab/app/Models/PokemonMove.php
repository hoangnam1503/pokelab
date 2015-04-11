<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PokemonMove extends Model {

    use SoftDeletes;

    protected $table = 'pokemon_moves';

    public function move() {
        return $this->belongsTo('Move');
    }

    public function pokemon() {
        return $this->belongsTo('Pokemon');
    }
}