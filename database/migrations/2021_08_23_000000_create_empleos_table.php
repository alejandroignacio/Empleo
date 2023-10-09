<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// CreateEmpleosTable.php
class CreateEmpleosTable extends Migration
{
    public function up()
    {
        Schema::create('empleos', function (Blueprint $table) {
            $table->id();
            $table->string('title');



            $table->text('descripcion');
            $table->timestamps();
            $table->enum('user_type', ['empleador', 'postulante']);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleos');
    }
}
