<?php

namespace App\Http\Controllers;

use App\Companies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyEntryController extends Controller
{
    public function index(){
        if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
        $table = Companies::where('companyType', 'All')->orderBy('companyID', 'desc')->get();
        $process = Companies::where('companyType', 'Process')->orderBy('companyID', 'desc')->get();

        return view('entry')->with(['table' => $table, 'process' => $process]);
        }else{
            return redirect('no-access');
        }
    }

    public function save(Request $request){
        if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){

        $table = new Companies;
        $table->name = $request->name;
        $table->companyType = $request->companyType;
        $table->save();

        return back();

            }else{
        return redirect('no-access');
        }
    }

    public function edit(Request $request){
        if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){

        $table = Companies::find($request->companyID);
        $table->name = $request->name;
        $table->companyType = $request->companyType;
        $table->save();

        return back();

        }else{
            return redirect('no-access');
        }
    }


    public function del($id){
        if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){

        $table = Companies::find($id);
        $table->delete();

        return back();

        }else{
            return redirect('no-access');
        }
    }
}
