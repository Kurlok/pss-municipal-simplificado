<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                //Os recursos deverão observar o modelo do formulário constante do Anexo IV, 
        //devendo esclarecer a discordância que ampara seu recurso e conter o nome do candidato, 
        //número de inscrição, emprego a que concorre e endereço de e-mail.
        Schema::create('recursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('numInscricao');

            // $table->unsignedBigInteger('fk_inscricoes_id');
            // $table->foreign('fk_inscricoes_id')->references('id')->on('inscricoes')->onDelete('cascade');
            $table->mediumText('fundamentacao');

            $table->string('nome');
            $table->string('emprego');
            $table->string('email');
            $table->string('rg');
            $table->string('cpf');
            $table->string('telefone')->nullable();
            $table->string('telefoneAlternativo')->nullable();
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
        Schema::dropIfExists('recursos');
    }
}
