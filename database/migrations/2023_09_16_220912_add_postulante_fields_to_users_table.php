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
            // Cambiamos el campo age por edad
            $table->integer('edad')->nullable();
            $table->string('full_name')->nullable();
            $table->string('phone')->nullable();
           
            $table->string('profile_picture')->nullable();
            $table->string('gender')->nullable();
            $table->text('skills')->nullable();
            $table->boolean('is_student')->default(false);
            $table->string('study_field')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('edad');
            $table->dropColumn('full_name');
            $table->dropColumn('phone');
           
            $table->dropColumn('profile_picture');
            $table->dropColumn('gender');
            $table->dropColumn('skills');
            $table->dropColumn('is_student');
            $table->dropColumn('study_field');
        });
    }
};
