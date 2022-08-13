<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    //
    public function user_messages(){
        $messages = auth()->user()->messages;
        return view('messages', compact($messages));
    }

    public function send_message_page(){
        return view('send-message');
    }

    public function send_message(Request $request){
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required'
        ]);

        auth()->user()->messages->create($request->all());
        
        return redirect('/user/dashboard');
    }
    
}
