<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicaoCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacao_categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publicacoes_id')->index();
            $table->foreign('publicacoes_id')->references('id')->on('publicacoes');
            $table->unsignedBigInteger('categorias_id')->index();
            $table->foreign('categorias_id')->references('id')->on('categorias');
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
        Schema::dropIfExists('publicacao_categorias');
    }
}
