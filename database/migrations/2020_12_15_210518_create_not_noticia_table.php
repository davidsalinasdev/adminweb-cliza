<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotNoticiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('not_noticia', function (Blueprint $table) {
            $table->bigIncrements('not_id');
            $table->string('slug', 255)->unique();
            $table->string('antetitulo', 300);
            $table->string('titulo', 300);
            $table->string('resumen', 300);
            $table->text('contenido');
            $table->text('imagen');
            $table->text('link_video')->nullable();
            $table->text('categorias');
            $table->text('palabras_clave');
            $table->integer('publicar');
            $table->date('fecha');
            $table->text('fuente');
            $table->integer('prioridad');
            $table->dateTime('fecha_registro');
            $table->dateTime('fecha_modificacion');
            $table->string('estado', 2);

            // Cambiando a unsignedBigInteger para la clave foránea
            $table->unsignedBigInteger('und_id');
            $table->unsignedBigInteger('usr_id');

            // Definición de claves foráneas
            $table->foreign('und_id')->references('und_id')->on('und_unidad')->onDelete('cascade');
            $table->foreign('usr_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('not_noticia');
        Schema::enableForeignKeyConstraints();
    }
}
