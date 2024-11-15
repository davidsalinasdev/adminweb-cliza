<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pro_producto', function (Blueprint $table) {
            $table->bigIncrements('pro_id')->nullable(false);
            $table->text('nombre')->nullable(false);
            $table->text('descripcion')->nullable(false);
            $table->integer('publicar')->nullable(false);
            $table->string('estado', 2)->nullable(false);
            $table->dateTime('fecha_registro')->nullable(false);
            $table->dateTime('fecha_modificacion')->nullable(false);
            $table->string('slug')->unique();

            $table->unsignedBigInteger('usr_id');
            $table->unsignedBigInteger('und_id');

            $table->foreign('usr_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('und_id')->references('und_id')->on('und_unidad')->onDelete('cascade');
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
        Schema::dropIfExists('pro_producto');
        Schema::enableForeignKeyConstraints();
    }
}
