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
            $table->string('department')->nullable()->after('location');  // Suponiendo que quieres agregarlo después de la columna 'location'.
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('empleos', function (Blueprint $table) {
        $table->dropColumn('department');
    });
}

};
