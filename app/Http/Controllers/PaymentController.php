<?php

namespace App\Http\Controllers;

use App\PaymentDetails;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function save(Request $request){
        if ($request->has('siteID')) {

            $siteID = $request->siteID;

            if(input_arr_check($request->all(), 5)){

                if($request->has('paymentID')){
                $table = PaymentDetails::find($request->paymentID);
                $table->siteID = $request->siteID;
                $table->paymentMethod = $request->paymentMethod;
                $table->billingFrequency = $request->billingFrequency;
                $table->bankName = $request->bankName;
                $table->shortCode = $request->shortCode;
                $table->accountName = $request->accountName;
                $table->accountNumber = $request->accountNumber;
                $table->save();
                $paymentID = $table->paymentID;

            }else{

                $table = new PaymentDetails();
                $table->siteID = $request->siteID;
                $table->paymentMethod = $request->paymentMethod;
                $table->billingFrequency = $request->billingFrequency;
                $table->bankName = $request->bankName;
                $table->shortCode = $request->shortCode;
                $table->accountName = $request->accountName;
                $table->accountNumber = $request->accountNumber;
                $table->save();
                $paymentID = $table->paymentID;

            }
            return response()->json(['success' => 1,'id' => $siteID, 'paymentID' => $paymentID]);

        }else{
            return response()->json(['success' => 1, 'id' => $siteID]);
        }

        }else{
            return response()->json(['success' => 0]);
        }
    }

    public function payment($id){
        if($id == '123456') {
            $table = PaymentDetails::all();
            return response()->json($table);
        }
    }
}
