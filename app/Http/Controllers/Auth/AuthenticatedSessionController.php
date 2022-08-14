<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */



    // ADMIN AUTH 
    public function admin_login_page(){
        return view('auth.admin.login');
    }

    public function admin_login(Request $request){
        
        $this->validate($request, [
            'email' => 'required | email',
            'password' => 'required'
        ]); 

        // if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => Hash::make($request->password)])){
        //     return redirect()->intended(RouteServiceProvider::ADMIN_HOME);
        // }
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::ADMIN_HOME);

        // return back()->withInput($request->only('email'));
    }





    // USER AUTH

    public function create()
    {
        return view('auth.login');
    }
    
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(LoginRequest $request)
    {

        $user = User::where('email', $request->email)->firstOrFail();

        if ($user->status == 'Pending'){
            return redirect('/pending');
        }

        else {

            $request->authenticate();

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout() || Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
