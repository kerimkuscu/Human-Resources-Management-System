<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentationTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('documentations', function(Blueprint $table) {
            $table->increments('id');
            $table->string('file_name');
            $table->string('file_type');
            $table->unsignedInteger('size')->default(0);
            $table->unsignedTinyInteger('format')->default(0);
            $table->unsignedInteger('project_id')->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('documentations');
    }
}
