<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricoSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_sensors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sensor_id')->unsigned(); //chave estrangeira
            $table->double('value')->nullable();
            $table->timestamps();
        });

        Schema::table('historico_sensors', function (Blueprint $table) {
            $table->foreign('sensor_id')->references('id')->on('sensors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historico_sensors');
    }
}
