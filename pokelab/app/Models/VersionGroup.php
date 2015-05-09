<?php
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VersionGroup extends Model {

    use SoftDeletes;

    protected $table = 'version_groups';


    public function pokemonMove() {
        return $this->belongsTo('PokemonMove');
    }
}
