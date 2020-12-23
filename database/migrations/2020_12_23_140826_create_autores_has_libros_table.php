<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoresHasLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autores_has_libros', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('autores_id');
            $table->foreign('autores_id')->references('id')->on('autores');
            
            $table->unsignedInteger('libros_ISEN');
            $table->foreign('libros_ISEN')->references('id')->on('libros');

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
        Schema::dropIfExists('autores_has_libros');
    }
}
