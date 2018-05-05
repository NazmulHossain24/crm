<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaterSupplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('water_supply', function (Blueprint $table) {
            $table->increments('waterSupplyID');
            $table->integer('siteID')->unsigned()->index();
            $table->foreign('siteID')->references('siteID')->on('site_details')->onDelete('CASCADE')->onUpdate('No Action');
            $table->string('company');
            $table->tinyInteger('meterNo');
            $table->string('account', 30)->nullable();
            $table->string('standingCharge', 15)->nullable();
            $table->string('unitCharge', 15)->nullable();
            $table->string('contractLength')->nullable();
            $table->date('processDate')->nullable();
            $table->date('startDate')->nullable();
            $table->date('noticeDate')->nullable();
            $table->date('expiryDate')->nullable();
            $table->string('meterSerial', 60)->nullable();
            $table->string('startReading', 15)->nullable();
            $table->string('endReading', 15)->nullable();
            $table->string('processWith')->nullable();
            $table->string('usesAQ', 15)->nullable();
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
        Schema::dropIfExists('water_supply');
    }
}
