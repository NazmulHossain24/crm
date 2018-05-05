<?php

namespace App\Http\Controllers;

use App\GasSupply;
use App\NoticeDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GasController extends Controller
{
    public function save(Request $request){
        if ($request->has('siteID')) {

            $siteID = $request->siteID;

            if($request->has('gasSupplyID')){
                $table = GasSupply::find($request->gasSupplyID);
                $totice = date("d/m/Y", strtotime($table->noticeDate));
                if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
                    $table->processWith = $request->processWith;
                }
                $table->siteID = $request->siteID;
                $table->company = $request->company;
                $table->meterNo = $request->meterNo;
                $table->upList = $request->upList;
                $table->mpr = $request->mpr;
                $table->currentAC = $request->currentAC;
                $table->standingCharge = $request->standingCharge;
                $table->unitCharge = $request->unitCharge;
                $table->processDate = $request->processDate;
                $table->startDate = $request->startDate;
                $table->noticeDate = $request->noticeDate;
                $table->expiryDate = $request->expiryDate;
                $table->meterSerial = $request->meterSerial;
                $table->startReading = $request->startReading;
                $table->endReading = $request->endReading;
                $table->usesAQ = $request->usesAQ;
                $table->save();
                $gasSupplyID = $table->gasSupplyID;

                if($totice != $request->noticeDate && $request->noticeDate != ''){
                    NoticeDate::where('siteID', $request->siteID)
                        ->where('meterNo', $gasSupplyID)
                        ->where('meterType', 'Gas')
                        ->update(['noticeDate' => db_date($request->noticeDate)]);
                }

            }else{
                $table = new GasSupply();
                if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
                    $table->processWith = $request->processWith;
                }
                $table->siteID = $request->siteID;
                $table->company = $request->company;
                $table->meterNo = $request->meterNo;
                $table->upList = $request->upList;
                $table->mpr = $request->mpr;
                $table->currentAC = $request->currentAC;
                $table->standingCharge = $request->standingCharge;
                $table->unitCharge = $request->unitCharge;
                $table->processDate = $request->processDate;
                $table->startDate = $request->startDate;
                $table->noticeDate = $request->noticeDate;
                $table->expiryDate = $request->expiryDate;
                $table->meterSerial = $request->meterSerial;
                $table->startReading = $request->startReading;
                $table->endReading = $request->endReading;
                $table->usesAQ = $request->usesAQ;
                $table->save();
                $gasSupplyID = $table->gasSupplyID;


                $notice = new NoticeDate();
                $notice->siteID = $request->siteID;
                $notice->noticeDate = $request->noticeDate;
                $notice->meterNo = $gasSupplyID;
                $notice->meterType = 'Gas';
                $notice->description = 'Gas Notice Date';
                $notice->save();

            }

            return response()->json(['success' => 1,'id' => $siteID, 'gasSupplyID' => $gasSupplyID]);

        }else{
            return response()->json(['success' => 0]);
        }
    }
}
