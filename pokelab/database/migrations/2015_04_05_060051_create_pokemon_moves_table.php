<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonMovesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pokemon_moves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pokemon_id');
            $table->bigInteger('move_id');
            $table->integer('level')->unsigned()->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->index(['pokemon_id', 'move_id'], 'pokemon_move_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('pokemon_moves');
    }

}
