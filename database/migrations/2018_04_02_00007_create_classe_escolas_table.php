<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasseEscolasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classe_escolas', function (Blueprint $table) {
            $table->integer('escola_id')->unsigned();
            $table->integer('cartacateg_id')->unsigned();
            $table->primary(['escola_id', 'cartacateg_id']);
            $table->double('preco');
            $table->boolean('estado');
            $table->foreign('escola_id')->references('id')->on('escolas');
            $table->foreign('cartacateg_id')->references('id')->on('categoria_cartas');
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
        Schema::dropIfExists('classe_escolas');
    }
}
