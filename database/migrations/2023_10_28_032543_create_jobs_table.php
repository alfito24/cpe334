<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->uuid('job_id')->primary();
            $table->foreignUuid('user_id')->constraint();
            $table->string('position');
            $table->string('description');
            $table->string('responsibilites');
            $table->string('salary');
            $table->string('location');
            $table->string('area_of_expertise');
            $table->string('internship_type');
            $table->date('deadline');
            $table->date('start');
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
        Schema::dropIfExists('jobs');
    }
}
