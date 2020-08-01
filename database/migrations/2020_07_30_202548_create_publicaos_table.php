<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicacoes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('resumo');
            $table->longText('conteudo');
            $table->string('imagem_destaque');
            $table->unsignedBigInteger('users_id')->index();
            $table->foreign('users_id')->references('id')->on('users');
            $table->unsignedBigInteger('tipo_publicacao')->index();
            $table->foreign('tipo_publicacao')->references('id')->on('tipo_categorias');
            $table->dateTime('publicado_em');
            $table->enum('visibilidade', ['Publico', 'Privado']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publicacoes');
    }
}
