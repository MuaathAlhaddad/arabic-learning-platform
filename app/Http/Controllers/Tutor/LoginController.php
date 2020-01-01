<?php

namespace App\Http\Controllers\Tutor;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
	public function __construct(){
        $this->middleware('guest:tutor');
	}	


    public function showLoginForm()
    {
    	return view('tutors.login'); 
    }


    public function login(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);
    	if(Auth::guard('tutor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember) ){
            

            if(isset(Auth::guard('tutor')->user()->ic_passport_no)){
                return redirect (route('tutors.show'));
            }
            
            return redirect (route('tutors.create'));
        }

    	return redirect()->back()->withInput($request->only('email', 'remember'))->with('error', 'Unmatched Credentials');
    	
    }
}
