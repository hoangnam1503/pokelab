@extends('layouts.default')

@section('content')

    <div>
        <ul>
            <li>
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
            </li>
        </ul>
    </div>

    <div>
        <div class="pokemon-defenses">
            <table class="table table-header-rotated pokemon-defenses-table">
                <thead>
                <tr>
                    @foreach($type_defenses as $key => $type_defense)
                        <th class="pokemon-type-badge-rotate">
                            <div>
                                <span class="poke-list-type {{ 'type-' . $key }}">{{ $key }}</span>
                            </div>
                        </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($type_defenses as $type_defense)
                        @if($type_defense == 0)
                            <td class="pokemon-type-defenses"><img src="../image/0.png" width="20" height="20"></td>
                        @elseif($type_defense == 0.25)
                            <td class="pokemon-type-defenses"><img src="../image/0-25.png" width="20" height="20"></td>
                        @elseif($type_defense == 0.5)
                            <td class="pokemon-type-defenses"><img src="../image/0-5.png" width="20" height="20"></td>
                        @elseif($type_defense == 2)
                            <td class="pokemon-type-defenses"><img src="../image/2.png" width="20" height="20"></td>
                        @elseif($type_defense == 4)
                            <td class="pokemon-type-defenses"><img src="../image/4.png" width="20" height="20"></td>
                        @else
                            <td class="pokemon-type-defenses"></td>
                        @endif
                    @endforeach
                </tr>
                </tbody>
            </table>
        </div>

        <table class="table table-header-rotated" id="table_id">
            <thead>
            <tr>
                <th style="display: none">ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Cat.</th>
                <th>Power</th>
                <th>PP</th>
                <th>Acc.</th>
                <th>Pr.</th>
                <th>Lv.</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pokemon_moves as $key => $pokemon_move)
                <tr>
                    <td style="display: none;">{{ $key }}</td>
                    <td>{{ $pokemon_move->move->name }}</td>
                    <td>
                        <span class="poke-list-type {{ 'type-' . $pokemon_move->move->type->name }}">{{ $pokemon_move->move->type->name }}</span>
                    </td>
                    <td>
                        <span class="poke-list-damage {{ 'type-' . $pokemon_move->move->damageClass->name }}">{{ $pokemon_move->move->damageClass->name }}</span>
                    </td>
                    <td>{{ $pokemon_move->move->power }}</td>
                    <td>{{ $pokemon_move->move->pp }}</td>
                    <td>{{ $pokemon_move->move->accuracy }}</td>
                    <td>{{ $pokemon_move->move->priority }}</td>
                    <td>{{ $pokemon_move->level }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.css">

    <!-- jQuery -->
    <script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

    <!-- DataTables -->
    <script type="text/javascript" charset="utf8"
            src="http://cdn.datatables.net/1.10.6/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function () {
            $('#table_id').DataTable({
                paging: false,
                searching: true
            });
        });
    </script>

@endsection
