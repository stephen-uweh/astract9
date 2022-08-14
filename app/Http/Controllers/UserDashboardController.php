<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    //
    public function user_messages(){
        $user = auth()->user();
        $messages = Messages::orderBy('created_at', 'desc')->where('user_id', $user->id)->get();
        return view('messages', compact($messages));
    }

    public function send_message_page(){
        return view('send-message');
    }

    public function send_message(Request $request){
        $user = auth()->user();
        $this->validate($request, [
            'subject' => 'required',
            'message' => 'required'
        ]);
        
        $data = [
            'user_id' => $user->id,
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Messages::create($data);
        
        return redirect('/user/dashboard');
    }
    
}
