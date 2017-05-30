<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sensores_tipos_id')->unsigned(); //chave estrangeira
            $table->string('nome');
            $table->double('value')->nullable();
            $table->timestamps();
        });

        Schema::table('sensors', function (Blueprint $table) {
            $table->foreign('sensores_tipos_id')->references('id')->on('sensores_tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensors');
    }
}
