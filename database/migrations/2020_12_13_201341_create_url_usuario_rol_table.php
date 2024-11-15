<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlUsuarioRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_usuario_rol', function (Blueprint $table) {
            $table->bigIncrements('url_id');
            $table->string('estado', 2);
            $table->dateTime('fecha');

            $table->unsignedBigInteger('usr_id'); // Asegurarse de que sea unsignedBigInteger
            $table->unsignedBigInteger('rol_id'); // Supongo que esta es otra clave foránea

            $table->foreign('usr_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('rol_id')->references('rol_id')->on('rol_rol')->onDelete('cascade');
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
        Schema::dropIfExists('url_usuario_rol');
        Schema::enableForeignKeyConstraints();
    }
}
