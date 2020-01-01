<?php

namespace App\Http\Controllers\Tutor;

use App\Tutor;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:tutor');
    }

    public function showRegistrationForm()
    {
        return view('tutors.register');
    }


    public function register (Request $request) {
        
                $validatedData = $request->validate([
                'first_name'      => 'bail|required|string|min:3|max:10',
                'last_name'       => 'required|string|min:3|max:10',
                'email'          => 'required|email|unique:tutors,email|email:rfc,dns',
                'password'       => 'required|confirmed|min:6',
            ]);

        $tutor = Tutor::create([
             'first_name'      => $request->first_name,
             'last_name'       => $request->last_name, 
             'email'          => $request->email,
             'password'       => Hash::make($request->password),
        ]);


        Auth::guard('tutor')->login($tutor);

        return redirect('tutors/create')->with('message', 'YOU HAVE REGISTERED SUCCESSFULLY');

    }
}
