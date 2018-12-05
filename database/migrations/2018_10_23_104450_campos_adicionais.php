<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CamposAdicionais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('pagamentos', function (Blueprint $table) {
//            $table->date('data_deposito')
//                ->nullable()
//                ->after('recibo_nr');
//            $table->string('tipo_pagamento');
//            $table->string('nome_balcao')
//                ->nullable();
//            //
//        });

        Schema::table('escolas',function (Blueprint $table){
           $table->string('pasta')->after('slogan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('pagamentos', function (Blueprint $table) {
//            $table->dropColumn('data_deposito');
//            $table->dropColumn('tipo_pagamento');
//            $table->dropColumn('nome_balcao');
//            //
//        });
    }
}
