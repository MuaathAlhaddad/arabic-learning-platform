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
    public function show() {
        $student = Student::find(Auth::id());

        return view('students.show', compact('student'));
    }

    public function update_photo(Request $request) {
        $request->validate([
            'profile_photo'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

        $path = $request->file('profile_photo')->store('public/students/profiles');
        $profile = ltrim($path,"public/students/profiles/");

        $student = Student::find(Auth::id());
        $student->profile_photo = $profile;
        $student->save();

        return redirect()->back()->with('status', 'YOUR PHOHO HAS BEEN UPDATED SUCCESSFULLY!');
    }
    public function edit() {
        return view('students.edit');
    }

    public function update(Request $request) {
        
        $validatedData = $request->validate([
            'first_name'      => 'bail|required|string|min:3|max:10',
            'last_name'       => 'required|string|min:3|max:10',
            'password'       => 'required|confirmed|min:6',
            'gender'       => 'required',
       ]);
       $student = Student::find(Auth::id());

       $student->first_name = $request->first_name;
       $student->last_name = $request->last_name;
       $student->password = Hash::make($request->password);
       $student->gender = $request->gender;
       $student->save();

       return redirect()->back();
    }
}
