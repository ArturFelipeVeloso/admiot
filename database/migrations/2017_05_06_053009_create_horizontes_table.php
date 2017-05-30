<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorizontesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horizontes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Things_id')->unsigned(); //chave estrangeira
            $table->integer('TipoOne_id')->unsigned(); //chave estrangeira
            $table->time('inicio');
            $table->time('fim');
            $table->time('duracao'); 
            $table->double('consumoduracao');
            $table->timestamps();
        });

        Schema::table('horizontes', function (Blueprint $table) {
            $table->foreign('Things_id')->references('id')->on('Things');
        });

        Schema::table('horizontes', function (Blueprint $table) {
            $table->foreign('TipoOne_id')->references('id')->on('tipo_ones');
        });

        Schema::table('horizontes', function($table){
            $table->time('inicio')->nullable()->change();
        });

        Schema::table('horizontes', function($table){
            $table->time('fim')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horizontes');
    }
}
