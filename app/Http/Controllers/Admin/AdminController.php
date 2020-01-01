<?php

namespace App\Http\Controllers\Admin;
use App\Student;
use App\Admin;
use App\Tutor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function index()
    {
        $admins = Admin::all();
        $num_students = Student::count();
        $num_tutors = Tutor::count();

        return view('admin.dashboard', ['num_students' => $num_students, 'num_tutors' => $num_tutors]);
    }


    public function student_index()
    {
        $students = Student::all();
        return view ('admin.students', ['students' => $students]);
    }


    public function tutor_index()
    {
        $tutors = Tutor::with('day_times')->get();
        return view ('admin.tutors', ['tutors' => $tutors]);
    }

    public function tutor_destroy($id)
    {
        // ->with('day_times')->first();
        $tutor = Tutor::find($id);
        // dd($tutor);
        
        $tutor->day_times()->detach();
        $tutor->delete();  

        return redirect()->back()->with('message', 'the tutor has been deleted successfully');
    }
    public function student_destroy($id)
    {
        
        $student = Student::findOrFail($id);
        // $student->detach()
        $student->delete();

        return redirect()->back()->with('message', 'the tutor has been deleted successfully');
    }
}
