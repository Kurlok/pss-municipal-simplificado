<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricoes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nome');
            $table->date('dataNascimento');
            $table->string('email')->nullable();
            $table->string('cpf');
            $table->string('rg');
            $table->string('ufRg');
            $table->string('orgaoExpedidor');
            $table->string('sexo');
            $table->string('telefone');
            $table->string('telefoneAlternativo')->nullable();
            $table->string('cep');
            $table->string('uf');
            $table->string('cidade');
            $table->string('rua');
            $table->bigInteger('numero');
            $table->string('complemento')->nullable();
            $table->unsignedBigInteger('fk_vagas_id');
            $table->foreign('fk_vagas_id')->references('id')->on('vagas');
            $table->Integer('totalPontosTitulos')->nullable();

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
        Schema::dropIfExists('inscricoes');
    }
}
