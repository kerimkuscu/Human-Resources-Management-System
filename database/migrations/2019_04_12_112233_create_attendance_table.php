<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('attendances', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->date('time_in_date');
            $table->unsignedInteger('time_in_time_hour');
            $table->unsignedInteger('time_in_time_minute');
            $table->date('time_out_date');
            $table->unsignedInteger('time_out_time_hour');
            $table->unsignedInteger('time_out_time_minute');
            $table->text('note')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
