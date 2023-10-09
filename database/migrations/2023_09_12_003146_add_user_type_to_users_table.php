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
    if (!Schema::hasColumn('users', 'user_type')) {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_type', 50)
                  ->after('password')
                  ->default('postulante')
                  ->comment('Tipo de usuario: empleador o postulante');
        });
    }
}


    public function down()
    {
        if (Schema::hasColumn('users', 'user_type')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('user_type');
            });
        }
    }
};
