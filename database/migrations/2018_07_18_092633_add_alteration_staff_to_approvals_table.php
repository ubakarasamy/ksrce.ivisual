<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAlterationStaffToApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staffapprovals', function($table){
            $table->string('alteration_staff_id');
            $table->string('alteration_staff_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staffapprovals', function($table){
            $table->string('alteration_staff_id');
            $table->string('alteration_staff_name');
        });
    }
}
