<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoveEffectsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('move_effects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('move_id');
            $table->bigInteger('effect_id');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['move_id', 'effect_id'], 'move_effect_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('move_effects');
    }

}
