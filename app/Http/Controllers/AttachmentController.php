<?php

namespace App\Http\Controllers;

use App\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AttachmentController extends Controller
{
    public function index(){
        $table = Attachment::orderby('attachmentID','DESC')->get();
        return view('attachment')->with(['table' => $table]);
    }

    public function save(Request $request){
        $is_update = 0;
        if ($request->hasFile('file_name')) {

            if ($request->file('file_name')->isValid()) {

                $extension = $request->file_name->extension();

                $table = new Attachment();
                $table->title = $request->title;
                $table->descriptions = $request->descriptions;
                $table->file_type = $extension;
                $table->save();

                $file_name = $table->attachmentID.'.'.$extension;
                $request->file_name->storeAs('attachment', $file_name);
                $is_update = 1;

            }
        }
        return back()->withInput(['is_upload' => $is_update]);
    }

    public function del($id,$type){
        $file_name = 'public/attachment/'.$id.'.'.$type;

        $table = Attachment::find($id);
        $table->delete();

        File::delete($file_name);

        return back()->withInput(['is_del' => 1]);
    }

}
