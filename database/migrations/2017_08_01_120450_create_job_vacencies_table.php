<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobVacenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_vacencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('recruit_title',100)->nullable();
            $table->string('experience',50)->nullable();
            $table->string('location',100)->nullable();
            $table->longtext('technical_skills')->nullable();
            $table->longtext('soft_skills')->nullable();
            $table->string('desired_candidate_profile')->nullable();
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
        Schema::dropIfExists('job_vacencies');
    }
}
