<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

    /**
     * Create a new controller instance.
     */
    public function __construct() {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index() {
//        $pokemon = \Pokemon::find(1);
//
//        foreach ($pokemon->pokemonMove as $pokemon_move) {
//
//            var_dump($pokemon_move->id . '-' . $pokemon_move->move_id . '-' . $pokemon_move->move->id . '-' . $pokemon_move->move->name);
//        }

        return view('welcome');
    }

}
