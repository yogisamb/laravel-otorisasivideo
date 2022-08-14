<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelasivideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relasivideos', function (Blueprint $table) {
            $table->id();
            $table->integer('video_id');
            $table->foreignId('user_id');
            $table->string('durasi')->nullable(true);
            $table->dateTime('timeup')->nullable(true);
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
        Schema::dropIfExists('relasivideos');
    }
}
