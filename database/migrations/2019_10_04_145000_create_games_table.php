<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('cols');
            $table->unsignedInteger('rows');
            $table->unsignedInteger('mines');
            $table->enum('result', ['win', 'loose'])->nullable();
            $table->timestamp('start')->nullable();
            $table->timestamp('stop')->nullable();
            $table->unsignedInteger('time')->nullable();
            $table->timestamp('endgame')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
