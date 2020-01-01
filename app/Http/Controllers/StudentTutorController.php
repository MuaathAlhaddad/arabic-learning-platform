<?php

namespace App\Http\Controllers;

use App\DayTime;
use App\DayTimeTutor;
use Auth;
use App\Tutor;
use App\Package;
use App\Student;
use App\StudentPackage;
use Illuminate\Support\Str;
use App\Student_Usage_Hours;
use App\StudentTutor;
use Illuminate\Http\Request;

class StudentTutorController extends Controller
{
    
    
    public function upload_materials (Request $request) {
        
        $request->validate([
            'student_materials'   => 'required|mimes:pdf|max:10000',
       ]);
        $path = $request->file('student_materials')->store('public/students_materials');
        $file = ltrim($path,"public/students_materials/");

        $student_tutor = StudentTutor::where('tutor_id', Auth::guard('tutor')->id())->first();
        $student_tutor->student_materials = $file;
        $student_tutor->save();

        return redirect()->back();
    }
    public function create(Request $request){
        $student_package = StudentPackage::where('student_id', Auth::id())->first();
        
        if(null !== $student_package){
            
            $student_usage = Student_Usage_Hours::where ('student_package_id', $student_package->id)->count();
            
            
            $package = Package::where('id', $student_package->package_id)->first();
                    if($package->no_hours!=$student_usage) 
                    {
                        
                        // dd($request->all());
                        // $request->tutor_id;
                        
                        $student = Student::find(Auth()->id());
                        $day_time_tutor = DayTimeTutor::where('day_time_id', $request->day_time_id)->first();
                        $day_time_tutor->selected  = True;
                        $day_time_tutor->save();
                        // dd($day_time_tutor);
                        
                        $student->tutors()->attach($request->tutor_id, ['day_time_tutor_id' => $day_time_tutor->id, 'student_package_id' => $student_package->id]);


                        return redirect()->route('students.show')->with('status', 'Your Booking has been accomplished');
                    }else{
                        return redirect()->route('package.index')->with('status', 'Your package has expired!');
                    }

        }else{
            return redirect()->route('packages.show')->with('message', 'Please purchase a package first!');
        }
    }


    public function show_packages() {
        return view('packages.show');
    }


    public function payment (Request $request) {
        $student_id = $request->student_id;
        $package_id = $request->package_id;
        $amount= $request->amount;
        
        return view('packages.payment',compact('student_id','package_id','amount'));
    }


    public function payment_process(Request $request){

        $student = Student::find($request->student_id);
        $transaction_id = Str::random(15);

        $student->packages()->attach($request->package_id, ['paid' => '1','transaction_id'=>$transaction_id, 'amount' => $request->amount]);
        
        return redirect()->route('tutors.index')->with('status', 'THANKS, YOUR PAYMENT IS APPROVED!');
    }
    public function index_lessons () {
        
        return view('pages.index_lessons');
    }
    
    public function lesson_one () {
        return view('pages.lesson_one');
    }
    
    public function lesson_two () {
        return view('pages.lesson_two');
    }
    
    public function lesson_three () {
        return view('pages.lesson_three');
    }
    
    public function lesson_four () {
        return view('pages.lesson_four');
    }

    
}
