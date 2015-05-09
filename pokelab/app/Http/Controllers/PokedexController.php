<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PokedexController extends Controller {
    public $temp;

    public function showPokemonDetail($pokemon_id) {
        $pokemon = \Pokemon::find($pokemon_id);
        $type_defenses = $this->getTypeDefenses($pokemon_id);

//        $pokemon_moves = \Move::with(['pokemonMove' => function($query) use ($pokemon_id) {
//            $query->whereRaw('version_group_id = 15 and pokemon_id = ?', [$pokemon_id]);
//        }])->get();

        $pokemon_move_method_id = 1;
        $pokemon_moves = \PokemonMove::whereRaw('version_group_id = 15 and pokemon_move_method_id = ? and pokemon_id = ?', [$pokemon_move_method_id, $pokemon_id])->orderBy('level')->get();

        return view('pokedex/pokemon_detail', ['pokemon' => $pokemon, 'type_defenses' => $type_defenses, 'pokemon_moves' => $pokemon_moves]);
    }

    public function getTypeDefenses($pokemon_id) {
        $pokemon = \Pokemon::find($pokemon_id);
        $types = \Type::where('is_default', '=', 1)->get();
        $type_defenses = array();

        foreach ($pokemon->pokemonType as $pokemon_type) {
            $pokemon_type_defenses[$pokemon_type->type_id] = \TypeEfficacy::whereRaw('pokemon_type_id = ?', [$pokemon_type->type_id])->orderBy('move_type_id')->get();
        }

        foreach ($types as $type) {
            foreach ($pokemon->pokemonType as $pokemon_type) {
                if (!isset($type_defenses[$type->name])) $type_defenses[$type->name] = 1;

                $type_defenses[$type->name] *= $pokemon_type_defenses[$pokemon_type->type_id][$type->id - 1]->damage_factor;
            }
        }

        return $type_defenses;
    }
}
