<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatasToStudentAttendanceRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_attendance_record', function($table){
            $table->string('degree');
            $table->string('department');
            $table->string('year');
            $table->string('section');
            $table->string('semester');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_attendance_record', function($table){
            $table->dropColumn('degree');
            $table->dropColumn('department');
            $table->dropColumn('year');
            $table->dropColumn('section');
            $table->dropColumn('semester');
        });
    }
}
