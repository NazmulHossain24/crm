<?php

namespace App\Http\Controllers;

use App\NewNote;
use App\SiteDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteDetailsController extends Controller
{
    public function save(Request $request){

        if ($request->has('siteID')) {
            $table = SiteDetails::find($request->siteID);

            if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
                $table->processWith = $request->processWith;
            }

            $table->productType = $request->productType;
            $table->contactName = $request->name_title.'. '.$request->contactName;
            $table->companyName = $request->companyName;
            $table->occupancyType = $request->occupancyType;
            $table->buildingName = $request->buildingName;
            $table->street = $request->street;
            $table->city = $request->city;
            $table->country = $request->country;
            $table->postCode = $request->postCode;
            $table->landLine = $request->landLine;
            $table->mobileNumber = $request->mobileNumber;
            $table->email = $request->email;
            $table->happy = $request->happy;
            if(count($request->contactMethod) > 0){
                $table->contactMethod = serialize($request->contactMethod);
            }
            $table->save();
            $siteID = $table->siteID;
        }else{
            $table = new SiteDetails();
            if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
                $table->processWith = $request->processWith;
            }
            $table->productType = $request->productType;
            $table->contactName = $request->name_title.'. '.$request->contactName;
            $table->companyName = $request->companyName;
            $table->occupancyType = $request->occupancyType;
            $table->buildingName = $request->buildingName;
            $table->street = $request->street;
            $table->city = $request->city;
            $table->country = $request->country;
            $table->postCode = $request->postCode;
            $table->landLine = $request->landLine;
            $table->mobileNumber = $request->mobileNumber;
            $table->email = $request->email;
            $table->happy = $request->happy;
            if(count($request->contactMethod) > 0){
                $table->contactMethod = serialize($request->contactMethod);
            }
            $table->save();
            $siteID = $table->siteID;
        }

        return response()->json(['success' => 1,'id' => $siteID]);

    }

    public function add_note(Request $request){
        $table = new NewNote();
        $table->siteID = $request->siteID;
        $table->description = $request->description;
        $table->save();

        return response()->json(['success' => 1]);
    }

    public function show_note($id){
        $table = NewNote::where('siteID', $id)->orderBy('noteID', 'DESC')->get();

        $data = [];

        foreach ($table as $row){
            $rowData['user'] = $row->user['name'];
            $rowData['created'] = pub_date_time($row->created_at);
            $rowData['description'] = $row->description;

            array_push($data, $rowData);
        }

        return response()->json(['success' => 1, 'all' => $data]);
    }

    public function change_status(Request $request){

        $table = SiteDetails::find($request->siteID);

        $oldUser = $table->userID;

        $table->status = $request->status;

        if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
            if($oldUser != $request->userID){
                $table->userID = $request->userID;
                $table->unsetEventDispatcher();
            }
        }

        $table->save();
        return back();
    }
    
    
    public function check_post_code(Request $request){
        $table = SiteDetails::where('postCode', $request->postCode)->orderBy('siteID', 'DESC')->get();

        if(count($table) > 0){
            return response()->json(['success' => 1, 'data' => $table]);
        }else{
            return response()->json(['success' => 0]);
        }

    }

    public function site($id){
        if($id == '123456') {
            $table = SiteDetails::all();
            return response()->json($table);
        }
    }


}
