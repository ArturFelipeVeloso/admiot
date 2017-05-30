<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('things', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('TipoTwo_id')->unsigned(); //chave estrangeira
            $table->double('potencia');
            $table->timestamps();
        });

        Schema::table('Things', function (Blueprint $table) {
            $table->foreign('TipoTwo_id')->references('id')->on('tipo_twos');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('things');
    }
}
