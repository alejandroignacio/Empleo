<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_aplicaciones_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Empleo;

class CreateAplicacionesTable extends Migration
{
    public function up()
    {
        Schema::create('aplicaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empleo_id');
            $table->unsignedBigInteger('user_id');
            $table->text('mensaje')->nullable();
            $table->string('cv_path')->nullable();
            $table->timestamps();

            // Relaciones
            $table->foreign('empleo_id')->references('id')->on('empleos')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('aplicaciones');
    }
}
