<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNombreEmpresaToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'company_name')) {
                $table->dropColumn('company_name');
            }
            if (Schema::hasColumn('users', 'nombre_empresa')) {
                $table->dropColumn('nombre_empresa');
            }
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'company_name')) {
                $table->string('company_name')->nullable();
            }
            if (!Schema::hasColumn('users', 'nombre_empresa')) {
                $table->string('nombre_empresa')->nullable();
            }
        });
    }
    
}
