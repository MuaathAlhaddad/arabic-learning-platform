<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function loginForm()
    {
        dd('I am here');
        if(Auth::guard('tutor')->check()) {
            return view('tutors.login'); 
        } elseif (Auth::guard('student')->check()) {
            return view('students.login');
        } elseif (Auth::guard('admin')->check()) {
            return view('admins.login');
        }
    }


    public function login()
    {
        dd('I am here');

    	$this->validate(request(), [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
        ]);
        if (Auth::guard('tutor')->attempt(['email' => request('email'), 'password' => request('password')], request('remember'))){            
            return redirect (route('tutors.create_2'));
        } elseif (Auth::guard('student')->attempt(['email' => request('email'), 'password' => request('password')], request('remember'))){            
    		return redirect()->intended(url('pages/home'));
        } elseif(Auth::guard('admin')->attempt(['email' => request('email'), 'password' => request('password')], request('remember'))){
    		return redirect()->intended(route('admins.dashboard'));
    	}else
    	    return redirect()->back()->withInput(request()->only('email', 'remember'))->with('error', 'Unmatched Credentials');
    	
    }
}
