<?php

namespace App\Http\Controllers;

use App\Insurance;
use App\NoticeDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InsuranceController extends Controller
{
    public function save(Request $request){
        if ($request->has('siteID')) {

            $siteID = $request->siteID;

            if(input_arr_check($request->all(), 9)){

                if($request->has('insuranceID')){
                $table = Insurance::find($request->insuranceID);
                $totice = date("d/m/Y", strtotime($table->noticeDate));
                    if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
                        $table->processWith = $request->processWith;
                    }
                $table->siteID = $request->siteID;
                $table->company = $request->company;
                $table->account = $request->account;
                $table->oldCharge = $request->oldCharge;
                $table->newCharge = $request->newCharge;
                $table->contractLength = $request->contractLength;
                $table->processDate = $request->processDate;
                $table->startDate = $request->startDate;
                $table->noticeDate = $request->noticeDate;
                $table->expiryDate = $request->expiryDate;
                $table->save();
                $insuranceID = $table->insuranceID;

                if($totice != $request->noticeDate && $request->noticeDate != ''){
                    NoticeDate::where('siteID', $request->siteID)
                        ->where('meterNo', $insuranceID)
                        ->where('meterType', 'Insurance')
                        ->update(['noticeDate' => db_date($request->noticeDate)]);
                }

            }else{

                $table = new Insurance();
                    if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
                        $table->processWith = $request->processWith;
                    }
                $table->siteID = $request->siteID;
                $table->company = $request->company;
                $table->account = $request->account;
                $table->oldCharge = $request->oldCharge;
                $table->newCharge = $request->newCharge;
                $table->contractLength = $request->contractLength;
                $table->processDate = $request->processDate;
                $table->startDate = $request->startDate;
                $table->noticeDate = $request->noticeDate;
                $table->expiryDate = $request->expiryDate;
                $table->save();
                $insuranceID = $table->insuranceID;


                $notice = new NoticeDate();
                $notice->siteID = $request->siteID;
                $notice->noticeDate = $request->noticeDate;
                $notice->meterNo = $insuranceID;
                $notice->meterType = 'Insurance';
                $notice->description = 'Insurance Notice Date';
                $notice->save();


            }
            return response()->json(['success' => 1,'id' => $siteID, 'insuranceID' => $insuranceID]);

        }else{
            return response()->json(['success' => 1, 'id' => $siteID]);
        }

        }else{
            return response()->json(['success' => 0]);
        }
    }
}
