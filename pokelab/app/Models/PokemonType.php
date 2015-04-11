<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PokemonType extends Model {

    use SoftDeletes;

    protected $table = 'pokemon_types';

    public function pokemon() {
        return $this->belongsTo('Pokemon');
    }

    public function type() {
        return $this->belongsTo('Type');
    }
}
