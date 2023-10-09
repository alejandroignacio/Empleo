<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Ya que 'full_name', 'phone', 'gender', 'skills', 'is_student' y 'study_field'
            // ya se agregaron en la primera migración, no necesitas agregarlos nuevamente aquí.
            // Así que la función up de esta migración se deja vacía.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Ya que no hemos agregado ninguna columna en la función up de esta migración,
            // tampoco necesitamos eliminar ninguna columna aquí. 
            // Así que la función down de esta migración se deja vacía.
        });
    }
};
