<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return view('home');
    }

    public function search() {
        $pokemons = \Pokemon::where('name', 'LIKE', '%' . \Input::get('pk') . '%')->get();

        return view('home', ['pokemons' => $pokemons]);
    }
}
