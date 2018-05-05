<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_line', function (Blueprint $table) {
            $table->increments('landLineID');
            $table->integer('siteID')->unsigned()->index();
            $table->foreign('siteID')->references('siteID')->on('site_details')->onDelete('CASCADE')->onUpdate('No Action');
            $table->string('company');
            $table->string('account', 30)->nullable();
            $table->string('telephoneNumber', 15)->nullable();
            $table->string('package', 15)->nullable();
            $table->integer('contractLength')->nullable();
            $table->date('processDate')->nullable();
            $table->date('startDate')->nullable();
            $table->date('noticeDate')->nullable();
            $table->date('expiryDate')->nullable();
            $table->string('processWith')->nullable();
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
        Schema::dropIfExists('land_line');
    }
}
