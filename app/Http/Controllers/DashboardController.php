<?php

namespace App\Http\Controllers;

use App\SiteDetails;
use App\NoticeDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function index(Request $request){

        return view('main');
    }


    public function show(Request $request){

        if ($request->has('dateRange')){
            $dtates = date_range($request->dateRange);

            if(Auth::user()->roles == 'Employee'){
                $totalData = $table = NoticeDate::whereBetween('noticeDate' , [$dtates[0], $dtates[1]])
                    ->whereHas('site', function ($query) {
                        $query->where('userID', '=',  Auth::user()->id);
                    })
                    ->get()->count();
            }else{
                $totalData = NoticeDate::whereBetween('noticeDate' , [$dtates[0], $dtates[1]])->get()->count();
            }

        }else{
            if(Auth::user()->roles == 'Employee'){
                $totalData = NoticeDate::where('noticeDate' ,'<=', date('Y-m-d'))
                    ->whereHas('site', function ($query) {
                        $query->where('userID', '=',  Auth::user()->id);
                    })
                    ->get()->count();
            }else{
                $totalData = NoticeDate::where('noticeDate' ,'<=', date('Y-m-d'))->get()->count();
            }
        }



        $columns = [
            0 => 'view',
            1 => 'siteID',
            2 => 'companyName',
            3 => 'meterType',
            4 => 'noticeDate',
            5 => 'expire_date',
            6 => 'user',
            7 => 'color'
        ];

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if ($request->has('dateRange')){
            $dtates = date_range($request->dateRange);

            if(Auth::user()->roles == 'Employee'){
                $table = NoticeDate::whereBetween('noticeDate' , [$dtates[0], $dtates[1]])
                    ->whereHas('site', function ($query) {
                        $query->where('userID', '=',  Auth::user()->id);
                    })
                    ->skip($start)
                    ->take($limit)
                    ->orderBy($order, $dir)
                    ->get();

                $filtered = NoticeDate::whereBetween('noticeDate' , [$dtates[0], $dtates[1]])
                    ->whereHas('site', function ($query) {
                        $query->where('userID', '=',  Auth::user()->id);
                    })
                    ->get()->count();
            }else{
                $table = NoticeDate::whereBetween('noticeDate' , [$dtates[0], $dtates[1]])
                    ->skip($start)
                    ->take($limit)
                    ->orderBy($order, $dir)
                    ->get();

                $filtered = NoticeDate::whereBetween('noticeDate' , [$dtates[0], $dtates[1]])->get()->count();
            }

        }else{
            if(Auth::user()->roles == 'Employee'){
                $table = NoticeDate::where('noticeDate' ,'<=', date('Y-m-d'))
                    ->whereHas('site', function ($query) {
                        $query->where('userID', '=',  Auth::user()->id);
                    })
                    ->skip($start)
                    ->take($limit)
                    ->orderBy($order, $dir)
                    ->get();

                $filtered = NoticeDate::where('noticeDate' ,'<=', date('Y-m-d'))
                    ->whereHas('site', function ($query) {
                        $query->where('userID', '=',  Auth::user()->id);
                    })
                    ->get()->count();
            }else{
                $table = NoticeDate::where('noticeDate' ,'<=', date('Y-m-d'))
                    ->skip($start)
                    ->take($limit)
                    ->orderBy($order, $dir)
                    ->get();

                $filtered = NoticeDate::where('noticeDate' ,'<=', date('Y-m-d'))->get()->count();
            }
        }


        $data = [];

        $siteData = 0;

        if($table){
            foreach ($table as $row){

                $siteData = $row->siteID;

                $rowData['view'] = '<div style="white-space:nowrap;" role="group">
                                    <a class="btn btn-flat btn-xs btn-primary" title="Preview" href="'.url('my/show', [$row->siteID]).'"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a class="btn btn-flat btn-xs btn-success" title="Edit" href="'.url('new/edi', [$row->siteID]).'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                </div>';
                $rowData['siteID'] = $row->siteID;
                $rowData['companyName'] = $row->site['companyName'];
                $rowData['type'] = $row->meterType;
                $rowData['notice_date'] = $row->noticeDate;
                $rowData['expire_date'] = $row->all_info($row->meterNo, $row->meterType);
                $rowData['user'] = $row->site->user['name'];


                $rowData['colors'] = status_color($row->all_info($row->meterNo, $row->meterType));

                $data[] = $rowData;
            }
        }


        $json_data = [
            'draw' => intval($request->input('draw')),
            'recordsTotal' => intval($totalData),
            'recordsFiltered' => intval($filtered),
            'data' => ($siteData < config('naz.limiter') ? $data:[])
        ];


        return response()->json($json_data);

    }

    public function del($id){

        $table = NoticeDate::find($id);
        $table->delete();

        return back();
    }


    public function search_api(Request $request){

        $search = '%'.$request->search.'%';

        $table = SiteDetails::select('siteID as id','companyName as text')
            ->where('companyName', 'like', $search)
            ->orderBy('companyName', 'ASC')
            ->take(15)
            ->get();

        return response()->json(['results' => $table]);

    }

    public function search(Request $request){

        if ($request->has('search')){
            $table = SiteDetails::find($request->search);

            return view('print.show')->with(['table' => $table]);
        }else{
            return back();
        }


    }

}
