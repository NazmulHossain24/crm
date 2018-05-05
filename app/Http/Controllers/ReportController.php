<?php

namespace App\Http\Controllers;

use App\NoticeDate;
use App\SubmitLog;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(){
        $user = User::all();
        return view('reports')->with(['users' => $user]);
    }

    public function warning_report(Request $request){
        $date_range = "From Beginning to End Date";
        if ($request->has('dateRange')){
            $date_range = $request->dateRange;
        }

        if ($request->has('dateRange')){
            $dtates = date_range($request->dateRange);

            if(Auth::user()->roles == 'Employee'){
                $table = NoticeDate::whereBetween('noticeDate' , [$dtates[0], $dtates[1]])
                    ->whereHas('site', function ($query) {
                        $query->where('userID', '=',  Auth::user()->id);
                    })
                    ->get();
            }else{
                $table = NoticeDate::whereBetween('noticeDate' , [$dtates[0], $dtates[1]])->get();
            }

        }else{
            if(Auth::user()->roles == 'Employee'){
                $table = NoticeDate::where('noticeDate' ,'<=', date('Y-m-d'))
                    ->whereHas('site', function ($query) {
                        $query->where('userID', '=',  Auth::user()->id);
                    })
                    ->get();
            }else{
                $table = NoticeDate::where('noticeDate' ,'<=', date('Y-m-d'))->get();
            }
        }

        return view('print.reports.warning')->with(['table' => $table, 'date_range' => $date_range]);

    }


    public function user_report(Request $request){
        $date_range = "From Beginning to End Date";
        $user_name = "All User";

        if ($request->has('dateRange')){
            $date_range = $request->dateRange;
        }

        $tbl = SubmitLog::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(electricity) AS electricity'),
            DB::raw('SUM(gas) AS gas'),
            DB::raw('SUM(water) AS water'),
            DB::raw('SUM(lend_line) AS lend_line'),
            DB::raw('SUM(broad_band) AS broad_band'),
            DB::raw('SUM(insurance) AS insurance'),
            DB::raw('SUM(e_pos) AS e_pos'));

        if ($request->has('userID')){
            $user = User::find($request->userID);
            $user_name = $user->name;

            $tbl->where('userID' , $request->userID);
        }

        $dtates = date_time_range($request->dateRange);

        $tbl->whereBetween('created_at' , [$dtates[0], $dtates[1]]);
        $tbl->groupBy('date');
        $table = $tbl->get();


        return view('print.reports.user_report')->with(['table' => $table, 'user_name' => $user_name, 'date_range' => $date_range]);
    }

}
