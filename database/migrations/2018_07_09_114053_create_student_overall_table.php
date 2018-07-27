<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentOverallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_overall', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->string('sub1');
            $table->integer('s1_total');
            $table->string('sub2');
            $table->integer('s2_total');
            $table->string('sub3');
            $table->integer('s3_total');
            $table->string('sub4');
            $table->integer('s4_total');
            $table->string('sub5');
            $table->integer('s5_total');
            $table->string('sub6');
            $table->integer('s6_total');
            $table->string('sub7');
            $table->integer('s7_total');
            $table->string('sub8');
            $table->integer('s8_total');
            $table->string('sub9');
            $table->integer('s9_total');
            $table->string('sub10');
            $table->integer('s11_total');
            $table->string('sub12');
            $table->integer('s12_total');
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
        Schema::dropIfExists('student_overall');
    }
}
