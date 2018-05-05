<?php

namespace App\Http\Controllers\Mysite;

use App\SiteDetails;
use App\SubmitLog;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    function index(){
        $table = User::orderBy('created_at', 'desc')->get();
        return view('my.site')->with(['table' => $table]);
    }

    public function data_table(Request $request){

        if(Auth::user()->roles == 'Employee'){
            $totalData = SiteDetails::where('userID', Auth::user()->id)->where('isSubmit', 'No')->orderBy('siteID', 'desc')->get()->count();
        }else{
            $totalData = SiteDetails::where('isSubmit', 'No')->orderBy('siteID', 'desc')->get()->count();
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
                $table = SiteDetails::where('userID', Auth::user()->id)->where('isSubmit', 'No')
                    ->skip($start)
                    ->take($limit)
                    ->orderBy($order, $dir)
                    ->get();
                $filtered = SiteDetails::where('userID', Auth::user()->id)->where('isSubmit', 'No')->orderBy('siteID', 'desc')->get()->count();
            }else{
                $table = SiteDetails::where('isSubmit', 'No')
                    ->skip($start)
                    ->take($limit)
                    ->orderBy($order, $dir)
                    ->get();
                $filtered = SiteDetails::where('isSubmit', 'No')->orderBy('siteID', 'desc')->get()->count();
            }
        }else{

            $searchs = $request->input('search.value');

            $search = "{$searchs}%";



            if(Auth::user()->roles == 'Employee'){
                $table = SiteDetails::where('userID', Auth::user()->id)
                    ->where('isSubmit', 'No')
                    ->where('companyName', 'like', $search)
                    ->skip($start)
                    ->take($limit)
                    ->orderBy($order, $dir)
                    ->get();
                $filtered = SiteDetails::where('userID', Auth::user()->id)
                    ->where('isSubmit', 'No')
                    ->where('companyName', 'like', $search)
                    ->get()->count();
            }else{
                $table = SiteDetails::where('isSubmit', 'No')
                    ->where('companyName', 'like', $search)
                    ->skip($start)
                    ->take($limit)
                    ->orderBy($order, $dir)
                    ->get();
                $filtered = SiteDetails::where('isSubmit', 'No')
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
                    <a class="btn btn-flat btn-xs btn-danger" title="Delete" onclick="return confirm(\'Are you sure to delete?\')" href="'.url('my/delete', [$row->siteID]).'"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                    <button class="btn btn-info btn-xs btn-flat changeStatuses" title="Change Status  & Forward to user" data-toggle="modal" data-user="'.$row->userID.'" data-id="'.$row->siteID.'" data-status="'.$row->status.'" data-target="#changeStatus"><i class="fa fa-random" aria-hidden="true"></i></button>
                    <button class="btn btn-warning btn-xs btn-flat noteAdd" title="Add Note" data-toggle="modal" data-id="'.$row->siteID.'" data-target="#addNote"><i class="fa fa-sticky-note-o" aria-hidden="true"></i></button>
                    <a class="btn btn-flat btn-xs btn-success" title="Submit" onclick="return confirm(\'Are you sure to submit?\')" href="'.url('my/submission', [$row->siteID]).'"><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
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


    public function del($id){
        if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
        $table = SiteDetails::find($id);
        $table->delete();

        return back();
        }else{
            return redirect('no-access');
        }
    }

    public function submission($id){

        DB::beginTransaction();
        try {
        $table = SiteDetails::find($id);
        $table->isSubmit = 'Yes';
        $table->save();

        $electric1 = $table->electric()->where('meterNo', 1)->first();
        $electric2 = $table->electric()->where('meterNo', 2)->first();
        $electric3 = $table->electric()->where('meterNo', 3)->first();

        $electric1_sec = count($electric1);
        $electric2_sec = count($electric2);
        $electric3_sec = count($electric3);

        $electric_count = $electric1_sec + $electric2_sec + $electric3_sec;

        $gas1 = $table->gas()->where('meterNo', 1)->first();
        $gas2 = $table->gas()->where('meterNo', 2)->first();
        $gas3 = $table->gas()->where('meterNo', 3)->first();

        $gas1_sec = count($gas1);
        $gas2_sec = count($gas2);
        $gas3_sec = count($gas3);

        $gas_count = $gas1_sec + $gas2_sec + $gas3_sec;

        $water1 = $table->water()->where('meterNo', 1)->first();
        $water2 = $table->water()->where('meterNo', 2)->first();
        $water3 = $table->water()->where('meterNo', 3)->first();

        $water1_sec = count($water1);
        $water2_sec = count($water2);
        $water3_sec = count($water3);

        $water_count = $water1_sec + $water2_sec + $water3_sec;

        $landLine = $table->land_line()->first();
        $broadband = $table->broadband()->first();
        $insurance = $table->insurance()->first();
        $ePos = $table->e_pos()->first();

        $landLine_count = count($landLine);
        $broadband_count = count($broadband);
        $insurance_count = count($insurance);
        $ePos_count = count($ePos);

            $log = new SubmitLog();

            $log->siteID = $id;
            $log->electricity = ($electric_count > 0 ? 1 : 0);
            $log->gas = ($gas_count > 0 ? 1 : 0);
            $log->water = ($water_count > 0 ? 1 : 0);
            $log->lend_line = $landLine_count;
            $log->broad_band = $broadband_count;
            $log->insurance = $insurance_count;
            $log->e_pos = $ePos_count;
            $log->isPay = 0;
            $log->userID = $table->userID;
            $log->save();


        DB::commit();
            } catch (\Throwable $e) {
        DB::rollback();
        throw $e;
        }

        return redirect('my/show/'.$id);
    }
}
