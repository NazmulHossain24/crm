<?php

namespace App\Http\Controllers;

use App\BroadBand;
use App\NoticeDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BroadBandController extends Controller
{
    public function save(Request $request){
        if ($request->has('siteID')) {

            $siteID = $request->siteID;
            if(input_arr_check($request->all(), 9)){

            if($request->has('broadBandID')){
                $table = BroadBand::find($request->broadBandID);
                if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
                    $table->processWith = $request->processWith;
                }
                $totice = date("d/m/Y", strtotime($table->noticeDate));
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
                $broadBandID = $table->broadBandID;

                if($totice != $request->noticeDate && $request->noticeDate != ''){
                    NoticeDate::where('siteID', $request->siteID)
                        ->where('meterNo', $broadBandID)
                        ->where('meterType', 'Broadband')
                        ->update(['noticeDate' => db_date($request->noticeDate)]);
                }

            }else{

                $table = new BroadBand();
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
                $broadBandID = $table->broadBandID;


                $notice = new NoticeDate();
                $notice->siteID = $request->siteID;
                $notice->noticeDate = $request->noticeDate;
                $notice->meterNo = $broadBandID;
                $notice->meterType = 'Broadband';
                $notice->description = 'Broadband Notice Date';
                $notice->save();


            }
            return response()->json(['success' => 1,'id' => $siteID, 'broadBandID' => $broadBandID]);

        }else{
            return response()->json(['success' => 1, 'id' => $siteID]);
        }

        }else{
            return response()->json(['success' => 0]);
        }
    }
}
