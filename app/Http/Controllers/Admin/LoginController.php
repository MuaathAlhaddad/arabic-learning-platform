<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
	public function __construct(){
        $this->middleware('guest:admin');

	}	


    public function showLoginForm()
    {
    	return view('admin.login'); 
    }


    public function login(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);
    	if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember) ){
    		return redirect()->intended(route('admins.dashboard'));
    	}

    	return redirect()->back()->withInput($request->only('email', 'remember'))->with('error', 'Unmatched Credentials');
    	
    }
}
