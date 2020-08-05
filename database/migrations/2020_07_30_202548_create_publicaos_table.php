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
            $table->longText('conteudo')->nullable();
            $table->string('imagem_destaque')->nullable();
            $table->string('link_externo')->nullable();
            $table->unsignedBigInteger('users_id')->index();
            $table->foreign('users_id')->references('id')->on('users');
            $table->dateTime('publicado_em');
            $table->enum('visibilidade', ['Publico', 'Privado']);
            $table->enum('tipo_publicacao', ['blog', 'depoimento','projeto'])->index();
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
