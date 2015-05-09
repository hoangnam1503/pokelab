<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaseTables extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255);
            $table->float('height')->default(0);
            $table->float('weight')->default(0);
            $table->integer('base_experience')->default(0);
            $table->tinyInteger('is_default')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('regions', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('generations', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('main_region_id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('main_region_id')->references('id')->on('regions');
        });
        Schema::create('damage_classes', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('version_groups', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('generation_id');
            $table->string('name');
            $table->integer('order')->default(0);
            $table->tinyInteger('is_default')->default(1);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('generation_id')->references('id')->on('generations');
        });
        Schema::create('versions', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('version_group_id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('version_group_id')->references('id')->on('version_groups');
        });
        Schema::create('types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->tinyInteger('is_default')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('moves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('generation_id');
            $table->unsignedBigInteger('damage_class_id');
            $table->string('name', 255);
            $table->integer('power')->default(0);
            $table->integer('pp')->default(0);
            $table->integer('accuracy')->default(0);
            $table->integer('priority')->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('generation_id')->references('id')->on('generations');
            $table->foreign('damage_class_id')->references('id')->on('damage_classes');
        });
        Schema::create('pokemon_move_methods', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('effects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('abilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('generation_id');
            $table->string('name', 255);
            $table->tinyInteger('is_default')->default(1);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('generation_id')->references('id')->on('generations');
        });
        Schema::create('pokemon_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pokemon_id');
            $table->unsignedBigInteger('type_id');
            $table->tinyInteger('slot_id')->default(1);
            $table->softDeletes();
            $table->timestamps();
            $table->index(['pokemon_id', 'type_id'], 'pokemon_type_idx');
            $table->foreign('pokemon_id')->references('id')->on('pokemons');
            $table->foreign('type_id')->references('id')->on('types');
        });
        Schema::create('pokemon_moves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pokemon_id');
            $table->unsignedBigInteger('move_id');
            $table->unsignedBigInteger('version_group_id');
            $table->unsignedBigInteger('pokemon_move_method_id');
            $table->integer('level')->default(0);
            $table->integer('order')->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->index(['pokemon_id', 'move_id'], 'pokemon_move_idx');
            $table->foreign('pokemon_id')->references('id')->on('pokemons');
            $table->foreign('move_id')->references('id')->on('moves');
            $table->foreign('version_group_id')->references('id')->on('version_groups');
            $table->foreign('pokemon_move_method_id')->references('id')->on('pokemon_move_methods');
        });
        Schema::create('pokemon_abilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pokemon_id');
            $table->unsignedBigInteger('ability_id');
            $table->tinyInteger('is_hidden')->default(0);
            $table->integer('slot_id')->default(1);
            $table->softDeletes();
            $table->timestamps();
            $table->index(['pokemon_id', 'ability_id'], 'pokemon_ability_idx');
            $table->foreign('pokemon_id')->references('id')->on('pokemons');
            $table->foreign('ability_id')->references('id')->on('abilities');
        });
        Schema::create('move_effects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('move_id');
            $table->unsignedBigInteger('effect_id');
            $table->integer('effect_chance')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->index(['move_id', 'effect_id'], 'move_effect_idx');
            $table->foreign('move_id')->references('id')->on('moves');
            $table->foreign('effect_id')->references('id')->on('effects');
        });
        Schema::create('type_efficacy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('move_type_id');
            $table->unsignedBigInteger('pokemon_type_id');
            $table->float('damage_factor')->default(1);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('move_type_id')->references('id')->on('types');
            $table->foreign('pokemon_type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('type_efficacy');
        Schema::drop('move_effects');
        Schema::drop('pokemon_abilities');
        Schema::drop('pokemon_moves');
        Schema::drop('pokemon_types');
        Schema::drop('abilities');
        Schema::drop('effects');
        Schema::drop('pokemon_move_methods');
        Schema::drop('moves');
        Schema::drop('types');
        Schema::drop('versions');
        Schema::drop('version_groups');
        Schema::drop('damage_classes');
        Schema::drop('generations');
        Schema::drop('regions');
        Schema::drop('pokemons');
    }

}
