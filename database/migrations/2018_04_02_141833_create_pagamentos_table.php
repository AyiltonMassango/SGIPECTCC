<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data_deposito');
            $table->double('valor_pagar');
            $table->string('recibo_nr',50)->unique()->nullable();
            $table->string('tipo_pagamento',50);
            $table->string('estado_pagamento');
            $table->integer('funcionario_id')->unsigned();
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->integer('inscricao_id')->unsigned();
            $table->foreign('inscricao_id')->references('id')->on('inscricaos');
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
        Schema::dropIfExists('pagamentos');
    }
}
