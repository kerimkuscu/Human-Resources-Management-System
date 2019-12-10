<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('employees', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->char('nationality')->nullable();
            $table->date('birthday');
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('driver_license')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('job_title');
            $table->text('address')->nullable();
            $table->text('city')->nullable();
            $table->char('country')->nullable();
            $table->text('province')->nullable();
            $table->text('postal_code')->nullable();
            $table->string('home_phone')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('work_phone')->nullable();
            $table->string('emergency_contact');
            $table->string('work_email')->unique()->nullable();
            $table->string('private_email')->unique()->nullable();
            $table->date('joined_date');
            $table->string('department');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
