<?php

namespace App\Http\Controllers;

use App\ElectricitySupply;
use App\NoticeDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ElectricityController extends Controller
{
    public function save(Request $request){
        if ($request->has('siteID')) {

            $siteID = $request->siteID;

            if($request->has('electricitySupplyID')){
                $table = ElectricitySupply::find($request->electricitySupplyID);
                $totice = date("d/m/Y", strtotime($table->noticeDate));
                if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
                    $table->processWith = $request->processWith;
                }
                $table->siteID = $request->siteID;
                $table->company = $request->company;
                $table->meterNo = $request->meterNo;
                $table->mpan = $request->mpan;
                $table->topLine = $request->topLine;
                $table->currentAC = $request->currentAC;
                $table->standingCharge = $request->standingCharge;
                $table->unitCharge = $request->unitCharge;
                $table->dayUnit = $request->dayUnit;
                $table->weekendUnit = $request->weekendUnit;
                $table->nightUnit = $request->nightUnit;
                $table->upList = $request->upList;
                $table->contractLength = $request->contractLength;
                $table->processDate = $request->processDate;
                $table->startDate = $request->startDate;
                $table->noticeDate = $request->noticeDate;
                $table->expiryDate = $request->expiryDate;
                $table->meterSerial = $request->meterSerial;
                $table->startReading = $request->startReading;
                $table->endReading = $request->endReading;
                $table->dayUses = $request->dayUses;
                $table->weekendUses = $request->weekendUses;
                $table->nightUses = $request->nightUses;
                $table->usesAQ = $request->usesAQ;
                $table->save();
                $electricitySupplyID = $table->electricitySupplyID;

                if($totice != $request->noticeDate && $request->noticeDate != ''){
                    NoticeDate::where('siteID', $request->siteID)
                        ->where('meterNo', $electricitySupplyID)
                        ->where('meterType', 'Electricity')
                        ->update(['noticeDate' => db_date($request->noticeDate)]);
                }

            }else{
                $table = new ElectricitySupply();
                if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
                    $table->processWith = $request->processWith;
                }
                $table->siteID = $request->siteID;
                $table->company = $request->company;
                $table->meterNo = $request->meterNo;
                $table->mpan = $request->mpan;
                $table->topLine = $request->topLine;
                $table->currentAC = $request->currentAC;
                $table->standingCharge = $request->standingCharge;
                $table->unitCharge = $request->unitCharge;
                $table->dayUnit = $request->dayUnit;
                $table->weekendUnit = $request->weekendUnit;
                $table->nightUnit = $request->nightUnit;
                $table->upList = $request->upList;
                $table->contractLength = $request->contractLength;
                $table->processDate = $request->processDate;
                $table->startDate = $request->startDate;
                $table->noticeDate = $request->noticeDate;
                $table->expiryDate = $request->expiryDate;
                $table->meterSerial = $request->meterSerial;
                $table->startReading = $request->startReading;
                $table->endReading = $request->endReading;
                $table->dayUses = $request->dayUses;
                $table->weekendUses = $request->weekendUses;
                $table->nightUses = $request->nightUses;
                $table->usesAQ = $request->usesAQ;
                $table->save();
                $electricitySupplyID = $table->electricitySupplyID;


                $notice = new NoticeDate();
                $notice->siteID = $request->siteID;
                $notice->noticeDate = $request->noticeDate;
                $notice->meterNo = $electricitySupplyID;
                $notice->meterType = 'Electricity';
                $notice->description = 'Electricity Notice Date';
                $notice->save();

            }

            return response()->json(['success' => 1,'id' => $siteID, 'electricitySupplyID' => $electricitySupplyID]);

        }else{
            return response()->json(['success' => 0]);
        }
    }
}
