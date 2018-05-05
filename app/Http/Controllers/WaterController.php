<?php

namespace App\Http\Controllers;

use App\NoticeDate;
use App\WaterSupply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WaterController extends Controller
{
    public function save(Request $request){
        if ($request->has('siteID')) {

            $siteID = $request->siteID;

            if($request->has('waterSupplyID')){
                $table = WaterSupply::find($request->waterSupplyID);

                $totice = date("d/m/Y", strtotime($table->noticeDate));
                if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
                    $table->processWith = $request->processWith;
                }
                $table->siteID = $request->siteID;
                $table->company = $request->company;
                $table->meterNo = $request->meterNo;
                $table->account = $request->account;
                $table->standingCharge = $request->standingCharge;
                $table->unitCharge = $request->unitCharge;
                $table->contractLength = $request->contractLength;
                $table->processDate = $request->processDate;
                $table->startDate = $request->startDate;
                $table->noticeDate = $request->noticeDate;
                $table->expiryDate = $request->expiryDate;
                $table->meterSerial = $request->meterSerial;
                $table->startReading = $request->startReading;
                $table->endReading = $request->endReading;
                $table->usesAQ = $request->usesAQ;
                $table->save();
                $waterSupplyID = $table->waterSupplyID;

                if($totice != $request->noticeDate && $request->noticeDate != ''){
                    NoticeDate::where('siteID', $request->siteID)
                        ->where('meterNo', $waterSupplyID)
                        ->where('meterType', 'Water')
                        ->update(['noticeDate' =>  db_date($request->noticeDate)]);
                }

            }else{

                $table = new WaterSupply();
                if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
                    $table->processWith = $request->processWith;
                }
                $table->siteID = $request->siteID;
                $table->company = $request->company;
                $table->meterNo = $request->meterNo;
                $table->account = $request->account;
                $table->standingCharge = $request->standingCharge;
                $table->unitCharge = $request->unitCharge;
                $table->contractLength = $request->contractLength;
                $table->processDate = $request->processDate;
                $table->startDate = $request->startDate;
                $table->noticeDate = $request->noticeDate;
                $table->expiryDate = $request->expiryDate;
                $table->meterSerial = $request->meterSerial;
                $table->startReading = $request->startReading;
                $table->endReading = $request->endReading;
                $table->usesAQ = $request->usesAQ;
                $table->save();
                $waterSupplyID = $table->waterSupplyID;


                $notice = new NoticeDate();
                $notice->siteID = $request->siteID;
                $notice->noticeDate = $request->noticeDate;
                $notice->meterNo = $waterSupplyID;
                $notice->meterType = 'Water';
                $notice->description = 'Water Notice Date';
                $notice->save();


            }
            return response()->json(['success' => 1,'id' => $siteID, 'waterSupplyID' => $waterSupplyID]);

        }else{
            return response()->json(['success' => 0]);
        }
    }
}
