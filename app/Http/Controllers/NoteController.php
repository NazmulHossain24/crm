<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class NoteController extends Controller
{
    public function index(){
        return view('note');
    }

    public function send(Request $request){
        $subject = $request->subject;
        $data = array('name' =>  Auth::user()->name, 'messages'=> $request->message, 'subject' => $subject);

        Mail::send('send', $data, function($message) {
            $message->from('info@mrahmangroup.com', Auth::user()->name);
            $message->to('wall.mate@gmail.com', 'MR. Rahman');
           // $message->cc('shawkat24@gmail.com', 'MR. Shawkat');
            $message->subject('Email By '.Auth::user()->name);
        });

        Session::flash('message', "Message Successfully Send!!");
        return back();

    }
}
