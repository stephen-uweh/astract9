<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function dashboard(){
        
        return view('admin.dashboard');
    }

    public function all_users(){
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }

    public function activate_user($id){

        $user = User::findOrFail($id);
        $user->status = 'Active';
        $user->save();

        return redirect('/admin/dashboard');
    }

    public function messages(){
        $messages = Messages::orderBy('created_at', 'desc')->get();
        return view('admin.messages', compact('messages'));
    }
}
