<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNoticeDateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_date', function (Blueprint $table) {
            $table->increments('noticeID');
            $table->integer('siteID')->unsigned()->index();
            $table->foreign('siteID')->references('siteID')->on('site_details')->onDelete('CASCADE')->onUpdate('No Action');
            $table->integer('meterNo');
            $table->string('meterType', 40);
            $table->date('noticeDate')->nullable();
            $table->string('description', 160);
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
        Schema::dropIfExists('notice_date');
    }
}
