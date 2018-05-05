<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->increments('companyDetailsID');
            $table->integer('siteID')->unsigned()->index();
            $table->foreign('siteID')->references('siteID')->on('site_details')->onDelete('CASCADE')->onUpdate('No Action');
            $table->string('companyStatus', 30)->nullable();
            $table->string('companyNumber', 30)->nullable();
            $table->string('sicDescription', 100)->nullable();
            $table->string('jobTitle', 80)->nullable();

            $table->string('address', 160)->nullable();
            $table->string('street', 60)->nullable();
            $table->string('town', 60)->nullable();
            $table->string('postCode', 60)->nullable();

            /*Sole Trader*/
            $table->date('dob1')->nullable();
            $table->string('house_number1', 60)->nullable();
            $table->string('home_street1', 60)->nullable();
            $table->string('home_town1', 60)->nullable();
            $table->string('home_country1', 60)->nullable();
            $table->string('home_post1', 60)->nullable();
            $table->string('address1', 160)->nullable();
            $table->string('house_number_s1', 60)->nullable();
            $table->string('street_s1', 60)->nullable();
            $table->string('town_s1', 60)->nullable();
            $table->string('home_country_s1', 60)->nullable();
            $table->string('post_s1', 60)->nullable();
            $table->string('address_s1', 160)->nullable();
            /*Sole Trader*/

            /*Partnership*/
            $table->date('dob2')->nullable();
            $table->string('house_number2', 60)->nullable();
            $table->string('home_street2', 60)->nullable();
            $table->string('home_town2', 60)->nullable();
            $table->string('home_country2', 60)->nullable();
            $table->string('home_post2', 60)->nullable();
            $table->string('address2', 160)->nullable();
            $table->string('house_number_s2', 60)->nullable();
            $table->string('street_s2', 60)->nullable();
            $table->string('town_s2', 60)->nullable();
            $table->string('home_country_s2', 60)->nullable();
            $table->string('post_s2', 60)->nullable();
            $table->string('address_s2', 160)->nullable();

            $table->string('other_partner', 100)->nullable();
            $table->date('other_dob2')->nullable();
            $table->string('other_house_number2', 60)->nullable();
            $table->string('other_home_street2', 60)->nullable();
            $table->string('other_home_town2', 60)->nullable();
            $table->string('other_home_country2', 60)->nullable();
            $table->string('other_home_post2', 60)->nullable();
            $table->string('other_address2', 160)->nullable();
            $table->string('other_house_number_s2', 60)->nullable();
            $table->string('other_street_s2', 60)->nullable();
            $table->string('other_town_s2', 60)->nullable();
            $table->string('other_home_country_s2', 60)->nullable();
            $table->string('other_post_s2', 60)->nullable();
            $table->string('other_address_s2', 160)->nullable();
            /*Partnership*/

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
        Schema::dropIfExists('company_details');
    }
}
