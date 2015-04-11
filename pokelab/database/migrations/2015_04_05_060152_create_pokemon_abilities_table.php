<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonAbilitiesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pokemon_abilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pokemon_id');
            $table->bigInteger('ability_id');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['pokemon_id', 'ability_id'], 'pokemon_ability_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('pokemon_abilities');
    }

}
