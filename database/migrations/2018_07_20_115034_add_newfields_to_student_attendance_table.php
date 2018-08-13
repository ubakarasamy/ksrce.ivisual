<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewfieldsToStudentAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_attendance', function($table){
            $table->string('degree');
            $table->string('department');
            $table->string('section');
            $table->string('year');
            $table->string('semester');
            $table->string('sem_start');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
    public function down()
    {
        Schema::table('student_attendance', function($table){
            $table->dropColumn('degree');
            $table->dropColumn('department');
            $table->dropColumn('section');
            $table->dropColumn('year');
            $table->dropColumn('semester');
            $table->dropColumn('sem_start');
        });
    }
}
