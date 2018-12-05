<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nr_ficha',50)->unique();
            $table->longText('foto_aluno');
            $table->double('percentagem_desconto');
            $table->double('total_a_pagar');
            $table->string('codigo_barras');
            $table->string('tipo_aulas');
            $table->string('nr_carta');
            $table->integer('categoria_carta_id')->unsigned();
            $table->foreign('categoria_carta_id')->references('cartacateg_id')->on('classe_escolas');
            $table->integer('funcionario_id')->unsigned()->nullable();
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->integer('aluno_id')->unsigned();
            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->integer('escola_id')->unsigned();
            $table->foreign('escola_id')->references('id')->on('escolas');
            $table->boolean('estado_pagamento');
            $table->longText('historico');
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
        Schema::dropIfExists('inscricaos');
    }
}
