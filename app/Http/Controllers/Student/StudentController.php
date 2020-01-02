<?php

namespace App\Http\Controllers\Student;
use App\Student;
use App\StudentPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function create() {
        return view('students.create');
    }


    public function store () {

        $validatedAttributes = $this->validate_Attributes();
        $validatedAttributes['password'] = Hash::make(request('password'));
        $student = Student::create($validatedAttributes);
        Auth::guard('student')->login($student);
        return redirect()->intended(route('tutors.index'))->with('message', 'ACCOUNT CREATED SUCCESSFULLY
        !');

    }

    public function show() {
        $student = Student::find(Auth::id());

        return view('students.show', compact('student'));
    }

    public function update_photo() {
        request()->validate([
            'profile_photo'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

        $path = request()->file('profile_photo')->store('public/students/profiles');
        $profile = basename($path);

        $student = Student::find(Auth::id());
        $student->profile_photo = $profile;
        $student->save();

        return redirect()->back()->with('message', 'YOUR PHOHO HAS BEEN UPDATED SUCCESSFULLY!');
    }
    
    public function edit() {
        return view('students.edit');
    }

    public function update() {
        $validatedAttributes = $this->validate_Attributes();
        $validatedAttributes['password'] = Hash::make(request('password'));
        $student = Student::findOrFail(Auth::id())->update($validatedAttributes);
       return redirect()->back()->with('message', 'YOUR ACCOUNT HAS BEEN UPDATED SUCCESSFULLY!');
    }

    public function validate_Attributes () {
        $validatedAttributes = request()->validate([
            'first_name'      => 'bail|required|string|min:3|max:10',
            'last_name'       => 'required|string|min:3|max:10',
            'password'       => 'required|confirmed|min:6',
            'gender'       => 'required',
       ]);
       if(Auth::user()->email == request('email')) {
            $validatedAttributes +=request()->validate([
                'email'        => 'required'
            ]);
        }else {
            $validatedAttributes += request()->validate([
                'email'          => 'required|email|unique:students,email|email:rfc,dns',
            ]);
        }
       return $validatedAttributes;
    }
}
