<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:student');

    }	
    public function showLoginForm()
    {
    	return view('students.login'); 
    }


    public function login(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);
    	if(Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember) ){            
    		return redirect()->intended(url('pages/home'));
        } 
        else
    	    return redirect()->back()->withInput($request->only('email', 'remember'))->with('error', 'Unmatched Credentials');
    	
    }
}
