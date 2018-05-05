<?php

namespace App\Http\Controllers\Mysite;

use App\SiteDetails;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    function index(){
        $table = User::orderBy('created_at', 'desc')->get();
        return view('my.submissions')->with(['table' => $table]);
    }



    public function data_table(Request $request){

        if(Auth::user()->roles == 'Employee'){
            $totalData = SiteDetails::where('userID', Auth::user()->id)->where('isSubmit', 'Yes')->orderBy('siteID', 'desc')->get()->count();
        }else{
            $totalData = SiteDetails::where('isSubmit', 'Yes')->orderBy('siteID', 'desc')->get()->count();
        }

        $columns = [
            0 => 'm_action',
            1 => 'updated_at',
            2 => 'productType',
            3 => 'siteID',
            4 => 'companyName',
            5 => 'postCode',
            6 => 'mpan',
            7 => 'mprn',
            8 => 'user',
            9 => 'status',
            10 => 'action'
        ];

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            if(Auth::user()->roles == 'Employee'){
                $table = SiteDetails::where('userID', Auth::user()->id)->where('isSubmit', 'Yes')
                    ->skip($start)
                    ->take($limit)
                    ->orderBy($order, $dir)
                    ->get();
                $filtered = SiteDetails::where('userID', Auth::user()->id)->where('isSubmit', 'Yes')->orderBy('siteID', 'desc')->get()->count();
            }else{
                $table = SiteDetails::where('isSubmit', 'Yes')
                    ->skip($start)
                    ->take($limit)
                    ->orderBy($order, $dir)
                    ->get();
                $filtered = SiteDetails::where('isSubmit', 'Yes')->orderBy('siteID', 'desc')->get()->count();
            }
        }else{

            $searchs = $request->input('search.value');

            $search = "{$searchs}%";



            if(Auth::user()->roles == 'Employee'){
                $table = SiteDetails::where('userID', Auth::user()->id)
                    ->where('isSubmit', 'Yes')
                    ->where('companyName', 'like', $search)
                    ->skip($start)
                    ->take($limit)
                    ->orderBy($order, $dir)
                    ->get();

                $filtered = SiteDetails::where('userID', Auth::user()->id)
                    ->where('isSubmit', 'Yes')
                    ->where('companyName', 'like', $search)
                    ->get()->count();
            }else{
                $table = SiteDetails::where('isSubmit', 'Yes')
                    ->where('companyName', 'like', $search)
                    ->skip($start)
                    ->take($limit)
                    ->orderBy($order, $dir)
                    ->get();
                $filtered = SiteDetails::where('isSubmit', 'Yes')
                    ->where('companyName', 'like', $search)
                    ->get()->count();
            }
        }


        $data = [];
        $siteData = 0;
        if($table){
            foreach ($table as $row){
                $rowData['m_action'] = '
                <div style="white-space:nowrap;" role="group">
                    <a class="btn btn-flat btn-xs btn-info" title="Preview" href="'.url('my/show', [$row->siteID]).'"><i class="fa fa-eye" aria-hidden="true"></i></a>
                    <a class="btn btn-flat btn-xs btn-success" title="Edit" href="'.url('new/edi', [$row->siteID]).'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                </div>
                ';
                $rowData['updated_at'] = pub_date_time($row->updated_at);
                $rowData['productType'] = $row->productType;
                $rowData['siteID'] = $row->siteID;
                $rowData['companyName'] = $row->companyName;
                $rowData['postCode'] = $row->postCode;

                $mpan = $row->electric()->first();
                $mrpn = $row->gas()->first();

                if(count($mpan)>0){
                    $rowData['mpan'] = $mpan->mpan;
                }else{
                    $rowData['mpan'] = '';
                }

                if(count($mrpn)>0){
                    $rowData['mprn'] = $mrpn->mpr;
                }else{
                    $rowData['mprn'] = '';
                }
                $siteData = $row->siteID;
                $rowData['user'] = $row->user['name'];
                $rowData['status'] = $row->status;
                $rowData['action'] = '
                <div style="white-space:nowrap;" role="group">
                    <button class="btn btn-info btn-xs btn-flat changeStatuses" title="Change Status & Forward to user" data-toggle="modal"  data-user="'.$row->userID.'" data-id="'.$row->siteID.'" data-status="'.$row->status.'" data-target="#changeStatus"><i class="fa fa-random" aria-hidden="true"></i></button>
                    <button class="btn btn-warning btn-xs btn-flat noteAdd" title="Add Note" data-toggle="modal" data-id="'.$row->siteID.'" data-target="#addNote"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></button>
                </div>
                ';

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



    public function show($id){

        $table = SiteDetails::find($id);

        if(Auth::user()->roles == 'Employee'){
            if(Auth::user()->id == $table->userID){
                return view('print.show')->with(['table' => $table]);
            }else{
                return redirect('no-access');
            }

        }else{
            return view('print.show')->with(['table' => $table]);
        }
    }
}
