<?php

namespace App\Http\Controllers;

use Auth;
use App\Tutor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\StudentTutor;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class TutorController extends Controller
{
    public function index () {
        $tutors = Tutor::with('day_times')->latest()->paginate(5);
        
        return view('tutors.index')->with('tutors', $tutors);
    }

    public function create_step1() {
        return view('tutors.create_step1');
    }

    public function store_step1 () {
        
        $validated_attributes = $this->validateAattributes_step1();
        $validated_attributes['password'] = Hash::make('password'); 
        $tutor = Tutor::create([$validated_attributes]);
        
        Auth::guard('tutor')->login($tutor);
        
        return redirect('tutors/create_step2')->with('message', 'YOU HAVE REGISTERED SUCCESSFULLY');
    }
    public function create_step2(){
        // if(isset(Auth::guard('tutor')->user()->ic_passport_no)){
        //     return redirect (route('tutors.show'));
        // }
        return view('tutors.create_step2');
    }
    
    public function store_step2(){ 
        $validated_attributes = $this->validateAattributes();
        $this->Store_in_DB($validated_attributes);
        return redirect(route('tutors.show'))->with('message', 'ACCOUNT CREATED SUCCESSFULLY!');
    }

    public function update (Request $request) {
        $validated_attributes = $this->validateAattributes();
        $this->Store_in_DB($validated_attributes);
        return redirect(route('tutors.show'))->with('message', 'YOUR ACCOUNT HAS BEEN UPDATED SUCCESSFULLY!');
    }
    public function validateAattributes_step1() {
        $validated_attributes = request()->validate([
            'first_name'      => 'bail|required|string|min:3|max:10',
            'last_name'       => 'required|string|min:3|max:10',
            'email'          => 'required|email|unique:tutors,email|email:rfc,dns',
            'password'       => 'required|confirmed|min:6',
        ]);

        return $validated_attributes;
    }

    public function validateAattributes_step2() {
        $validatedAttributes = request()->validate([
            'address'        => 'required',    
            'country'        => 'required',
            'profile_photo'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'qualifications'   => 'required|mimes:pdf|max:10000',
            'headline'       => 'required',
            'gender'         =>'required',
            'tutor_desc'      => 'required|max:300',
            'timeslot'      => 'required',
        ]);
         
         if(Auth::user()->ic_passport_no == request('ic_passport_no')) {
            $validatedAttributes += request()->validate([
                'ic_passport_no'  => 'required'
            ]);
         }else {
             $validatedAttributes += request()->validate([
                'ic_passport_no'  => 'required|unique:tutors,ic_passport_no'
            ]);
         }
        
         if(isset(Auth::user()->ic_passport_no)){      
                $validatedAttributes +=request()->validate([
                        'first_name'      => 'bail|required|string|min:3|max:10',
                        'last_name'       => 'required|string|min:3|max:10',
                        'password'       => 'required|confirmed|min:6',
                ]);
                
                if(Auth::user()->email == request('email')) {
                    $validatedAttributes +=request()->validate([
                        'email'        => 'required'
                    ]);
                }else {
                        $validatedAttributes += request()->validate([
                            'email'        => 'required|email|unique:tutors,email|email:rfc,dns',
                    ]);
                }
        }

        $validated_attributes =$this->store_files($validatedAttributes);
        return $validated_attributes;
     }
     public function store_files($validatedAttributes) { 
         $path = request()->file('profile_photo')->store('public/profiles');
         $profile = basename($path);
         
         $path = request()->file('qualifications')->store('public/qualifications');
         $file = basename($path);
         $validatedAttributes['profile_photo'] = $profile;
         $validatedAttributes['qualifications'] = $file;  
         
         return $validatedAttributes;
     }
    
     public function Store_in_DB($validated_attributes){
        //tutor registration goes thr two steps, 
            // 1) General information (name, email, password)
            // 2) More detailed information (gender, desc, headline...)
        //this function handle storing step 2 and updating     
        $tutor = Tutor::findOrFail(Auth::id());
        $tutor->address = $validated_attributes['address'];
        $tutor->country = $validated_attributes['country'];
        $tutor->profile_photo = $validated_attributes['profile_photo'];
        $tutor->qualifications = $validated_attributes['qualifications'];
        $tutor->headline = $validated_attributes['headline'];
        $tutor->gender = $validated_attributes['gender'];
        $tutor->tutor_desc = $validated_attributes['tutor_desc'];
        $tutor->ic_passport_no = $validated_attributes['ic_passport_no'];
        if(isset(Auth::user()->ic_passport_no)) {
            //if the tutor has done both steps, he is currently updating  
            $tutor->first_name = $validated_attributes['first_name'];
            $tutor->last_name = $validated_attributes['last_name'];
            $tutor->password = Hash::make($validated_attributes['password']); 
            $tutor->email = $validated_attributes['email'];    
            $tutor->save();
            $tutor->day_times()->sync(request()->timeslot);
        }else{
            //if the tutor is basically doing step 2 now
            $tutor->ic_passport_no = $validated_attributes['ic_passport_no'];
            $tutor->save();
        }

    }
    
    public function show() {
        $tutor = Tutor::find(Auth::id());
        return view('tutors.show')->with('tutor', $tutor);
    }
    
    public function edit() {
        $tutor = Tutor::findOrFail(Auth::id());
        $tutor->day_times()->detach();
        return view('tutors.edit')->with('tutor', $tutor);
    }

    public function accept_reject (Request $request) {
        // $request->0 for reject
        // $request->1 for accept
        switch ($request->input('action')) {
            case 'accept':
                    $student_tutor = StudentTutor::where('day_time_tutor_id', $request->day_time_tutor_id)->first();
                    $student_tutor->accept_reject = 1;
                    $student_tutor->save();
                    return redirect()->back();
                break;
            case 'reject':
                $student_tutor = StudentTutor::where('day_time_tutor_id', $request->day_time_tutor_id)->first();
                $student_tutor->accept_reject = 0;
                $student_tutor->save();
                return redirect()->back();
                break;
        }
        dd($request->all());
        // $student_tutor = StudentTutor::where()
    }

    
}
