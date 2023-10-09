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
    Schema::table('empleos', function (Blueprint $table) {
        $table->string('location')->nullable()->after('id');  // Aquí asumimos que quieres agregarlo después de la columna 'id'. Cambia 'id' si necesitas otra posición.
    });
}


    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('empleos', function (Blueprint $table) {
        $table->dropColumn('location');
    });
}

};
