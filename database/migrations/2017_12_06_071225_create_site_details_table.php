<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_details', function (Blueprint $table) {
            $table->increments('siteID');
            $table->string('productType', 15)->default('New Customer');
            $table->string('contactName', 80);
            $table->string('companyName', 100)->nullable();
            $table->string('occupancyType',15)->nullable();
            $table->string('buildingName', 100);
            $table->string('street', 80);
            $table->string('city', 80);
            $table->string('country', 80);
            $table->string('postCode', 30);
            $table->string('landLine', 30)->nullable();
            $table->string('mobileNumber', 30)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('happy', 3)->default('Yes');
            $table->string('contactMethod', 100)->nullable();
            $table->string('status', 30)->default('Active');
            $table->string('isSubmit', 3)->default('No');
            $table->string('processWith')->nullable();
            $table->integer('createdBy')->nullable()->unsigned()->index();
            $table->foreign('createdBy')->references('id')->on('users')->onDelete('No Action')->onUpdate('No Action');
            $table->integer('userID')->nullable()->unsigned()->index();
            $table->foreign('userID')->references('id')->on('users')->onDelete('No Action')->onUpdate('No Action');
            $table->softDeletes();
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
        Schema::dropIfExists('site_details');
    }
}
