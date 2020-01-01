<?php

namespace App\Http\Controllers\Student;

use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Auth;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:student');
    }

    public function showRegistrationForm()
    {
        return view('students.register');
    }


    public function register (Request $request) {

            $validatedData = $request->validate([
             'first_name'      => 'bail|required|string|min:3|max:10',
             'last_name'       => 'required|string|min:3|max:10',
             'email'          => 'required|email|unique:students,email|email:rfc,dns',
             'password'       => 'required|confirmed|min:6',
             'gender'       => 'required',
        ]);

        $student = Student::create([
             'first_name'      => $request->first_name,
             'last_name'       => $request->last_name, 
             'email'          => $request->email,
             'password'       => Hash::make($request->password),
             'gender'         => $request->gender,  
        ]);

        Auth::guard('student')->login($student);
        return redirect()->intended(route('tutors.index'))->with('status', 'ACCOUNT CREATED SUCCESSFULLY
        !');

    }
}
