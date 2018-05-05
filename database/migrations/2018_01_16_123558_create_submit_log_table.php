<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmitLogTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('submit_log', function (Blueprint $table) {
            $table->increments('submitLogID');
            $table->integer('siteID')->unsigned()->index();
            $table->foreign('siteID')->references('siteID')->on('site_details')->onDelete('CASCADE')->onUpdate('No Action');
            $table->boolean('electricity')->default(0);
            $table->boolean('gas')->default(0);
            $table->boolean('water')->default(0);
            $table->boolean('lend_line')->default(0);
            $table->boolean('broad_band')->default(0);
            $table->boolean('insurance')->default(0);
            $table->boolean('e_pos')->default(0);
            $table->boolean('isPay')->default(0);
            $table->integer('userID')->nullable()->unsigned()->index();
            $table->foreign('userID')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('No Action');
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
        Schema::dropIfExists('submit_log');
    }
}
