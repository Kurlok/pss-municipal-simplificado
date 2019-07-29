<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricoesTitulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricoes_titulos', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_titulos_id');
            $table->unsignedBigInteger('fk_inscricoes_id');
            $table->foreign('fk_titulos_id')->references('id')->on('titulos');
            $table->foreign('fk_inscricoes_id')->references('id')->on('inscricoes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscricoes_titulos');
    }
}
