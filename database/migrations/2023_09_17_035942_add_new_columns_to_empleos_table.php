<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToEmpleosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleos', function (Blueprint $table) {
            if (!Schema::hasColumn('empleos', 'title')) {
               $table->string('title');
            }
         });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empleos', function (Blueprint $table) {
            $table->dropColumn('titulo');
        });
    }
}
