<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasssubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classsubjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('degree');
            $table->string('department');
            $table->string('year');
            $table->string('semester');
            $table->string('section');
            $table->string('last_modified')->default(null);
            $table->string('sub1')->default('null');
            $table->string('sub2')->default('null');
            $table->string('sub3')->default('null');
            $table->string('sub4')->default('null');
            $table->string('sub5')->default('null');
            $table->string('sub6')->default('null');
            $table->string('sub7')->default('null');
            $table->string('sub8')->default('null');
            $table->string('sub9')->default('null');
            $table->string('sub10')->default('null');
            $table->string('sub11')->default('null');
            $table->string('sub12')->default('null');
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
        Schema::dropIfExists('classsubjects');
    }
}
