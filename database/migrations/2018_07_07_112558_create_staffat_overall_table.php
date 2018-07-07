<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffatOverallTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffat_overall', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id');
            $table->integer('present');
            $table->integer('absent');
            $table->integer('cl');
            $table->integer('cpl');
            $table->integer('pp');
            $table->integer('pl');
            $table->integer('od');
            $table->integer('sod');
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
        Schema::dropIfExists('staffat_overall');
    }
}
