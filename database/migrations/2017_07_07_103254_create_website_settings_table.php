<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name',255);
            $table->string('company_email',100);
            $table->string('company_phone_no',15);
            $table->string('company_address',255);
            $table->string('company_fb_link',255);
            $table->string('company_twiter_link',255);
            $table->string('company_linkin_link',255);
            $table->string('company_client_projects_images,255');
            $table->longtext('company_aboutus');
            $table->string('company_portfolio',255);
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
        Schema::dropIfExists('website_settings');
    }
}
