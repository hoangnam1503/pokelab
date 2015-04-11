<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('moves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('type_id');
            $table->string('name', 255);
            $table->integer('power')->default(0);
            $table->integer('pp')->default(0);
            $table->integer('accuracy')->default(0);
            $table->integer('priority')->default(0);
            $table->bigInteger('effect_id')->default(0);
            $table->integer('effect_chance');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('moves');
    }

}
