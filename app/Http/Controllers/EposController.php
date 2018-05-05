<?php

namespace App\Http\Controllers;

use App\Epos;
use App\NoticeDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EposController extends Controller
{
    public function save(Request $request){
        if ($request->has('siteID')) {

            $siteID = $request->siteID;

            if(input_arr_check($request->all(), 11)){

                if($request->has('posID')){
                $table = Epos::find($request->posID);
                $totice = date("d/m/Y", strtotime($table->noticeDate));
                    if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
                        $table->processWith = $request->processWith;
                    }
                $table->siteID = $request->siteID;
                $table->company = $request->company;
                $table->account = $request->account;
                $table->setupCharge = $request->setupCharge;
                $table->weeklyCharge = $request->weeklyCharge;
                $table->contractLength = $request->contractLength;
                $table->processDate = $request->processDate;
                $table->startDate = $request->startDate;
                $table->noticeDate = $request->noticeDate;
                $table->expiryDate = $request->expiryDate;
                $table->oneOf = $request->oneOf;
                $table->descriptions = $request->descriptions;
                $table->save();
                $posID = $table->posID;

                if($totice != $request->noticeDate && $request->noticeDate != ''){
                    NoticeDate::where('siteID', $request->siteID)
                        ->where('meterNo', $posID)
                        ->where('meterType', 'E-Pos')
                        ->update(['noticeDate' => db_date($request->noticeDate)]);
                }

            }else{

                $table = new Epos();
                    if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
                        $table->processWith = $request->processWith;
                    }
                $table->siteID = $request->siteID;
                $table->company = $request->company;
                $table->account = $request->account;
                $table->setupCharge = $request->setupCharge;
                $table->weeklyCharge = $request->weeklyCharge;
                $table->contractLength = $request->contractLength;
                $table->processDate = $request->processDate;
                $table->startDate = $request->startDate;
                $table->noticeDate = $request->noticeDate;
                $table->expiryDate = $request->expiryDate;
                $table->oneOf = $request->oneOf;
                $table->descriptions = $request->descriptions;
                $table->save();
                $posID = $table->posID;


                $notice = new NoticeDate();
                $notice->siteID = $request->siteID;
                $notice->noticeDate = $request->noticeDate;
                $notice->meterNo = $posID;
                $notice->meterType = 'E-Pos';
                $notice->description = 'E-Pos Notice Date';
                $notice->save();


            }
            return response()->json(['success' => 1,'id' => $siteID, 'posID' => $posID]);

        }else{
            return response()->json(['success' => 1, 'id' => $siteID]);
        }

        }else{
            return response()->json(['success' => 0]);
        }
    }
}
