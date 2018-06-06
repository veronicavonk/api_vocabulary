<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalabrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palabras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('palabra');
            $table->string('palabra_tipo');
            $table->text('palabra_significado');
            $table->text('palabra_imagen');
            $table->text('palabra_audio');
            $table->string('palabra_dificultad');
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
        Schema::dropIfExists('palabras');
    }
}
