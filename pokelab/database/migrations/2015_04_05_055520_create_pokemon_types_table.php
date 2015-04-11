<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokemonTypesTable extends Migration {

    /**
     * Run the migrations.
     * TODO: add foreign key
     * @return void
     */
    public function up() {
        Schema::create('pokemon_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pokemon_id');
            $table->bigInteger('type_id');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['pokemon_id', 'type_id'], 'pokemon_type_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('pokemon_types');
    }

}
