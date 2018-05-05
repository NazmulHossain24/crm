<?php

namespace App\Http\Controllers;

use App\Companies;
use App\SiteDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewSiteController extends Controller
{
    function index(){
        $table = Companies::where('companyType', 'All')->orderBy('companyID', 'desc')->get();
        $process = Companies::where('companyType', 'Process')->orderBy('companyID', 'desc')->get();
        return view('newsite')->with(['table' => $table, 'process' => $process]);
    }

    public function edi($id){
        $table = Companies::where('companyType', 'All')->orderBy('companyID', 'desc')->get();
        $process = Companies::where('companyType', 'Process')->orderBy('companyID', 'desc')->get();
        $site = SiteDetails::where('siteID', $id)->first();

        if(Auth::user()->roles == 'Employee'){

            if(Auth::user()->id == $site->userID){
                return view('newsite')->with(['table' => $table, 'site' => $site, 'process' => $process]);
            }else{
                return redirect('no-access');
            }
        }else{
            return view('newsite')->with(['table' => $table, 'site' => $site, 'process' => $process]);
        }
    }
}
