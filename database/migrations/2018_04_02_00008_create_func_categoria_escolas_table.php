<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncCategoriaEscolasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('func_categoria_escolas', function (Blueprint $table) {
            $table->integer('escola_id')->unsigned();
            $table->foreign('escola_id')->references('id')->on('escolas');
            $table->integer('funcCateg_id')->unsigned();
            $table->foreign('funcCateg_id')->references('id')->on('categoria_funcionarios');
            $table->primary(['escola_id', 'funcCateg_id']);
            $table->boolean('estado');
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
        Schema::dropIfExists('func_categoria_escolas');
    }
}
