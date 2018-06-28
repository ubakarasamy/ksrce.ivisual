<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentAttendanceRecord extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_attendance_record', function (Blueprint $table) {
            $table->increments('id');
            $table->date('attendancedate');
            $table->integer('student_id');
            $table->string('regno');
            $table->string('hrspresent');
            $table->string('h1');
            $table->string('h2');
            $table->string('h3');
            $table->string('h4');
            $table->string('h5');
            $table->string('h6');
            $table->string('h7');
            $table->string('h8');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_attendance_record');
    }
}
