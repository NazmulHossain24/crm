<?php

namespace App\Http\Controllers;

use App\CompanyDetails;
use Illuminate\Http\Request;

class CompanyDetailsController extends Controller
{
    public function save(Request $request){
        if ($request->has('siteID')) {

            $siteID = $request->siteID;

            if($request->has('companyNumber') || $request->has('jobTitle')){

                if($request->has('companyDetailsID')){
                $table = CompanyDetails::find($request->companyDetailsID);
                $table->siteID = $request->siteID;
                $table->companyStatus = $request->companyStatus;
                $table->companyNumber = $request->companyNumber;
                $table->sicDescription = $request->sicDescription;
                $table->jobTitle = $request->jobTitle;

                $table->address = $request->address;
                $table->street = $request->street;
                $table->town = $request->town;
                $table->postCode = $request->postCode;

                $table->dob1 = $request->dob1;
                $table->house_number1 = $request->house_number1;
                $table->home_street1 = $request->home_street1;
                $table->home_town1 = $request->home_town1;
                $table->home_country1 = $request->home_country1;
                $table->home_post1 = $request->home_post1;
                $table->address1 = $request->address1;
                $table->house_number_s1 = $request->house_number_s1;
                $table->street_s1 = $request->street_s1;
                $table->town_s1 = $request->town_s1;
                $table->home_country_s1 = $request->home_country_s1;
                $table->post_s1 = $request->post_s1;
                $table->address_s1 = $request->address_s1;

                $table->dob2 = $request->dob2;
                $table->house_number2 = $request->house_number2;
                $table->home_street2 = $request->home_street2;
                $table->home_town2 = $request->home_town2;
                $table->home_country2 = $request->home_country2;
                $table->home_post2 = $request->home_post2;
                $table->address2 = $request->address2;
                $table->house_number_s2 = $request->house_number_s2;
                $table->street_s2 = $request->street_s2;
                $table->town_s2 = $request->town_s2;
                $table->home_country_s2 = $request->home_country_s2;
                $table->post_s2 = $request->post_s2;
                $table->address_s2 = $request->address_s2;

                $table->other_partner = $request->other_partner;
                $table->other_dob2 = $request->other_dob2;
                $table->other_house_number2 = $request->other_house_number2;
                $table->other_home_street2 = $request->other_home_street2;
                $table->other_home_town2 = $request->other_home_town2;
                $table->other_home_country2 = $request->other_home_country2;
                $table->other_home_post2 = $request->other_home_post2;
                $table->other_address2 = $request->other_address2;
                $table->other_house_number_s2 = $request->other_house_number_s2;
                $table->other_street_s2 = $request->other_street_s2;
                $table->other_town_s2 = $request->other_town_s2;
                $table->other_home_country_s2 = $request->other_home_country_s2;
                $table->other_post_s2 = $request->other_post_s2;
                $table->other_address_s2 = $request->other_address_s2;

                $table->save();
                $companyDetailsID = $table->companyDetailsID;

            }else{

                $table = new CompanyDetails();
                $table->siteID = $request->siteID;
                $table->companyStatus = $request->companyStatus;
                $table->companyNumber = $request->companyNumber;
                $table->sicDescription = $request->sicDescription;
                $table->jobTitle = $request->jobTitle;

                $table->address = $request->address;
                $table->street = $request->street;
                $table->town = $request->town;
                $table->postCode = $request->postCode;

                $table->dob1 = $request->dob1;
                $table->house_number1 = $request->house_number1;
                $table->home_street1 = $request->home_street1;
                $table->home_town1 = $request->home_town1;
                $table->home_country1 = $request->home_country1;
                $table->home_post1 = $request->home_post1;
                $table->address1 = $request->address1;
                $table->house_number_s1 = $request->house_number_s1;
                $table->street_s1 = $request->street_s1;
                $table->town_s1 = $request->town_s1;
                $table->home_country_s1 = $request->home_country_s1;
                $table->post_s1 = $request->post_s1;
                $table->address_s1 = $request->address_s1;

                $table->dob2 = $request->dob2;
                $table->house_number2 = $request->house_number2;
                $table->home_street2 = $request->home_street2;
                $table->home_town2 = $request->home_town2;
                $table->home_country2 = $request->home_country2;
                $table->home_post2 = $request->home_post2;
                $table->address2 = $request->address2;
                $table->house_number_s2 = $request->house_number_s2;
                $table->street_s2 = $request->street_s2;
                $table->town_s2 = $request->town_s2;
                $table->home_country_s2 = $request->home_country_s2;
                $table->post_s2 = $request->post_s2;
                $table->address_s2 = $request->address_s2;

                $table->other_partner = $request->other_partner;
                $table->other_dob2 = $request->other_dob2;
                $table->other_house_number2 = $request->other_house_number2;
                $table->other_home_street2 = $request->other_home_street2;
                $table->other_home_town2 = $request->other_home_town2;
                $table->other_home_country2 = $request->other_home_country2;
                $table->other_home_post2 = $request->other_home_post2;
                $table->other_address2 = $request->other_address2;
                $table->other_house_number_s2 = $request->other_house_number_s2;
                $table->other_street_s2 = $request->other_street_s2;
                $table->other_town_s2 = $request->other_town_s2;
                $table->other_home_country_s2 = $request->other_home_country_s2;
                $table->other_post_s2 = $request->other_post_s2;
                $table->other_address_s2 = $request->other_address_s2;

                $table->save();
                $companyDetailsID = $table->companyDetailsID;

            }
            return response()->json(['success' => 1,'id' => $siteID, 'companyDetailsID' => $companyDetailsID]);

        }else{
            return response()->json(['success' => 1, 'id' => $siteID]);
        }

        }else{
            return response()->json(['success' => 0]);
        }
    }
}
