<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class BattleController extends Controller {

    public function showTypeChart() {
        $types = \Type::where('is_default', '=', 1)->get();
        $type_defenses = $this->getTypeDefenses();

        return view('battle/type-chart', ['type_defenses' => $type_defenses, 'types' => $types]);
    }

    public function getTypeDefenses() {
        $types = \Type::where('is_default', '=', 1)->get();
        $pokemon_types = $types;
        $type_defenses = array();

        foreach ($pokemon_types as $pokemon_type) {
            $type_efficacy = \TypeEfficacy::where('pokemon_type_id', '=', $pokemon_type->id)->get();
            $type_defenses[$pokemon_type->name] = $type_efficacy;
        }

        return $type_defenses;
    }
}
