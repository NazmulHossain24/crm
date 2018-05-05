<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
        $table = User::orderBy('created_at', 'desc')->get();
        return view('users')->with(['table' => $table]);
        }else{
            return redirect('no-access');
        }
    }


    public function save(Request $request)
    {
        if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){

        $table = new User();
        $table->name = $request->name;
        $table->email = $request->email;
        $table->nid = $request->nid;
        $table->address = $request->address;
        $table->contact = $request->contact;
        $table->roles = 'Employee';
        $table->dob = $request->dob;
        $table->viewAs = $request->viewAs;
        $table->password = bcrypt($request->password);
        $table->save();
        return back();

        }else{
            return redirect('no-access');
        }
    }

    public function edite_user(Request $request)
    {
        if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){

        $table = User::find($request->id);
        $table->name = $request->name;
        $table->email = $request->email;
        $table->nid = $request->nid;
        $table->address = $request->address;
        $table->contact = $request->contact;
        $table->dob = $request->dob;
        $table->viewAs = $request->viewAs;
        $table->password = bcrypt($request->password);
        $table->save();
        return back();

            }else{
        return redirect('no-access');
        }
    }

    public function changes(Request $request)
    {
        if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
        $table = User::find($request->id);

        if($request->roles == 'Super'){
            $table->roles = 'Admin';
            $table->su = 1;
        }else{
            $table->roles = $request->roles;
            $table->su = 0;
        }
            $table->save();
            return back();

        }else{
            return redirect('no-access');
        }
    }

    public function del($id)
    {
        if(Auth::user()->roles == 'Admin' && Auth::user()->su == 1){
            $table = User::find($id);
            $table->delete();
            return back();
        }else{
            return redirect('no-access');
        }

    }
}
