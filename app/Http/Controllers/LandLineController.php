<?php

namespace App\Http\Controllers;

use App\LandLine;
use App\NoticeDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandLineController extends Controller
{
    public function save(Request $request){

        if ($request->has('siteID')) {
            $siteID = $request->siteID;

            if(input_arr_check($request->all(), 9)){

            if($request->has('landLineID')){
                $table = LandLine::find($request->landLineID);
                $totice = date("d/m/Y", strtotime($table->noticeDate));
                if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
                    $table->processWith = $request->processWith;
                }
                $table->siteID = $request->siteID;
                $table->company = $request->company;
                $table->account = $request->account;
                $table->telephoneNumber = $request->telephoneNumber;
                $table->package = $request->package;
                $table->contractLength = $request->contractLength;
                $table->processDate = $request->processDate;
                $table->startDate = $request->startDate;
                $table->noticeDate = $request->noticeDate;
                $table->expiryDate = $request->expiryDate;
                $table->save();
                $landLineID = $table->landLineID;

                if($totice != $request->noticeDate && $request->noticeDate != ''){
                    NoticeDate::where('siteID', $request->siteID)
                        ->where('meterNo', $landLineID)
                        ->where('meterType', 'Land Line')
                        ->update(['noticeDate' => db_date($request->noticeDate)]);
                }

            }else{

                $table = new LandLine();
                if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
                    $table->processWith = $request->processWith;
                }
                $table->siteID = $request->siteID;
                $table->company = $request->company;
                $table->account = $request->account;
                $table->telephoneNumber = $request->telephoneNumber;
                $table->package = $request->package;
                $table->contractLength = $request->contractLength;
                $table->processDate = $request->processDate;
                $table->startDate = $request->startDate;
                $table->noticeDate = $request->noticeDate;
                $table->expiryDate = $request->expiryDate;
                $table->save();
                $landLineID = $table->landLineID;

                $notice = new NoticeDate();
                $notice->siteID = $request->siteID;
                $notice->noticeDate = $request->noticeDate;
                $notice->meterNo = $landLineID;
                $notice->meterType = 'Land Line';
                $notice->description = 'Land Line Notice Date';
                $notice->save();


            }
            return response()->json(['success' => 1,'id' => $siteID, 'landLineID' => $landLineID]);

        }else{
            return response()->json(['success' => 1, 'id' => $siteID]);
        }

        }else{
            return response()->json(['success' => 0]);
        }



    }
}
