@extends('layouts.default')

@section('content')
    @if (isset($pokemons[0]))
        <div>
            <ul>
                @foreach($pokemons as $pokemon)
                    <li>
                        <a href="/pokedex/{{ $pokemon->id }}">
                            <div class="poke-list-item">
                                <div class="poke-list-icon">
                                    <img src="../image/icon.png" width="100px" height="100px">
                                </div>
                                <div class="poke-list-detail">
                                    <span class="poke-list-name">{{ $pokemon->name }}</span>
                                    @foreach($pokemon->pokemonType as $pokemon_type)
                                        <span class="poke-list-type {{ 'type-' . $pokemon_type->type->name }}">{{ $pokemon_type->type->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
