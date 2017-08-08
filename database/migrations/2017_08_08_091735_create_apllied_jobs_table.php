<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAplliedJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apllied_jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50)->nullable();
            $table->string('email',100)->nullable();
            $table->string('phone_no',15)->nullable();
            $table->string('file',100)->nullable();
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
        Schema::dropIfExists('apllied_jobs');
    }
}
