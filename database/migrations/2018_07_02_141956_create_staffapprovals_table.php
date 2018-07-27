<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffapprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffapprovals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id');
            $table->string('approvalfor');
            $table->text('description');
            $table->integer('status');
            $table->string('approvedby');
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
        Schema::dropIfExists('staffapprovals');
    }
}
