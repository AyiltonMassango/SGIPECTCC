<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Triggers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        DB::unprepared('
            CREATE TRIGGER trg_pagamento AFTER UPDATE ON `pagamnto_mensalidades` FOR EACH ROW
            BEGIN
                
            END 
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
