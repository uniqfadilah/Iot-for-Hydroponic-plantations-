<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGreenhouse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('greenhouse', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->string('penanggungjawab_id');
            $table->string('datasayur_id')->nullable();
            $table->string('termometer_id');
            $table->string('luxmeter_id');
            $table->string('kipas_id');
            $table->string('lampu_id');
            $table->string('tandon_id');
            $table->string('status');
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
        Schema::dropIfExists('greenhouse');
    }
}
