<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSayur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasayur', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('namasayur');
            $table->char('umurpanen', 2);
            $table->double('nutrisiopt',8,2);
            $table->double('suhuopt',8,2);
            $table->double('kelembabanopt',8,2);
            $table->double('luxopt',8,2);
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
        Schema::dropIfExists('data_sayur');
    }
}
