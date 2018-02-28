<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolucoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solucoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('erro_id')->unsigned();
            $table->longText('descricao');
            $table->timestamps();
            $table->foreign('erro_id')->references('id')->on('erros');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solucoes');
    }
}
