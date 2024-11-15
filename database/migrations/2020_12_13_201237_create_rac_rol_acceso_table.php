<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacRolAccesoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rac_rol_acceso', function (Blueprint $table) {
            $table->bigIncrements('rac_id');
            $table->string('estado', 2);
            $table->unsignedBigInteger('acc_id'); // Cambiado a unsignedBigInteger
            $table->unsignedBigInteger('rol_id'); // Cambiado a unsignedBigInteger

            // Definición de claves foráneas sin dropForeign()
            $table->foreign('acc_id')->references('acc_id')->on('acc_acceso')->onDelete('cascade');
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
        Schema::dropIfExists('rac_rol_acceso');
        Schema::enableForeignKeyConstraints();
    }
}
