<?php

namespace App\Http\Controllers;

use App\BillingDetails;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function save(Request $request){
        if ($request->has('siteID')) {

            $siteID = $request->siteID;

            if(input_arr_check($request->all(), 6)){

                if($request->has('billingID')){
                $table = BillingDetails::find($request->billingID);
                $table->siteID = $request->siteID;
                $table->buildingNumber = $request->buildingNumber;
                $table->street = $request->street;
                $table->town = $request->town;
                $table->country = $request->country;
                $table->postCode = $request->postCode;
                $table->save();
                $billingID = $table->billingID;

            }else{

                $table = new BillingDetails();
                $table->siteID = $request->siteID;
                $table->buildingNumber = $request->buildingNumber;
                $table->street = $request->street;
                $table->town = $request->town;
                $table->country = $request->country;
                $table->postCode = $request->postCode;
                $table->save();
                $billingID = $table->billingID;

            }
            return response()->json(['success' => 1,'id' => $siteID, 'billingID' => $billingID]);

        }else{
            return response()->json(['success' => 1, 'id' => $siteID]);
        }

        }else{
            return response()->json(['success' => 0]);
        }
    }

    public function billing($id){
        if($id == '123456'){
            $table = BillingDetails::all();
            return response()->json($table);
        }
    }
}
