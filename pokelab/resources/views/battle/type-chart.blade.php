@extends('layouts.default')

@section('content')

    <div>
        <table class="table table-header-rotated" id="table_id">
            <thead>
            <tr>
                <th></th>
                @foreach($types as $type)
                    <th class="pokemon-type-badge-rotate"><div>
                            <span class="poke-list-type {{ 'type-' . $type->name }}">{{ $type->name }}</span>
                        </div></th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($types as $type)
                <tr>
                    <td class="pokemon-type-badge"><div>
                            <span class="poke-list-type {{ 'type-' . $type->name }}">{{ $type->name }}</span>
                        </div></td>
                    @foreach($type_defenses[$type->name] as $type_efficacy)
                        @if($type_efficacy->damage_factor == 0)
                            <td class="pokemon-type-defenses"><img src="../image/0.png" width="20" height="20"></td>
                        @elseif($type_efficacy->damage_factor == 0.25)
                            <td class="pokemon-type-defenses"><img src="../image/0-25.png" width="20" height="20"></td>
                        @elseif($type_efficacy->damage_factor == 0.5)
                            <td class="pokemon-type-defenses"><img src="../image/0-5.png" width="20" height="20"></td>
                        @elseif($type_efficacy->damage_factor == 2)
                            <td class="pokemon-type-defenses"><img src="../image/2.png" width="20" height="20"></td>
                        @elseif($type_efficacy->damage_factor == 4)
                            <td class="pokemon-type-defenses"><img src="../image/4.png" width="20" height="20"></td>
                        @else
                            <td class="pokemon-type-defenses"></td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{--<!-- DataTables CSS -->--}}
    {{--<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.css">--}}

    {{--<!-- jQuery -->--}}
    {{--<script type="text/javascript" charset="utf8" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>--}}

    {{--<!-- DataTables -->--}}
    {{--<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.6/js/jquery.dataTables.js"></script>--}}

    {{--<script>--}}
        {{--$(document).ready( function () {--}}
            {{--$('#table_id').DataTable({--}}
                {{--paging: false,--}}
                {{--searching: true--}}
            {{--});--}}
        {{--} );--}}
    {{--</script>--}}

@endsection
