<?php

namespace App\Http\Controllers\Tutor;

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

    public function create(){
        if(isset(Auth::guard('tutor')->user()->ic_passport_no)){
            return redirect (route('tutors.show'));
        }
        return view('tutors.create');
    }
    
    public function store(){ 
        $validated_attributes = $this->validateAattributes();
        $this->Store_in_DB($validated_attributes);
        return redirect(route('tutors.show'))->with('message', 'ACCOUNT CREATED SUCCESSFULLY!');
    }

    public function update (Request $request) {
        $validated_attributes = $this->validateAattributes();
        $this->Store_in_DB($validated_attributes);
        return redirect(route('tutors.show'))->with('message', 'YOUR ACCOUNT HAS BEEN UPDATED SUCCESSFULLY!');
    }

    public function validateAattributes() {
        $validatedAttributes = request()->validate([
            'address'        => 'required',    
            'country'        => 'required',
            'profile_photo'   => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'qualifications'   => 'required|mimes:pdf|max:10000',
            'headline'       => 'required',
            'gender'         =>'required',
            'tutor_desc'      => 'required|max:300',
            'timeslot'      => 'required',
            'ic_passport_no'  => 'required|unique:tutors,ic_passport_no'
         ]);
         
         if(isset(Auth::user()->ic_passport_no)){      
            $validatedAttributes +=request()->validate([
                     'first_name'      => 'bail|required|string|min:3|max:10',
                     'last_name'       => 'required|string|min:3|max:10',
                     'password'       => 'required|confirmed|min:6',
                     'email'        => 'required|email|unique:tutors,email|email:rfc,dns',
             ]);
        } 

        $validated_attributes =$this->store_files($validatedAttributes);
 
        return $validated_attributes;
     }
     public function store_files($validatedAttributes) { 
         $path = request()->file('profile_photo')->store('public/profiles');
         $profile = ltrim($path,"public/profiles/");
         
         $path = request()->file('qualifications')->store('public/qualifications');
         $file = ltrim($path,"public/qualifications/");
         $validatedAttributes['profile_photo'] = $profile;
         $validatedAttributes['qualifications'] = $file;  
         
         return $validatedAttributes;
     }
    
     public function Store_in_DB($validated_attributes){
        $tutor = Tutor::findOrFail(Auth::id());
        $tutor->address = $validated_attributes['address'];
        $tutor->country = $validated_attributes['country'];
        $tutor->profile_photo = $validated_attributes['profile_photo'];
        $tutor->qualifications = $validated_attributes['qualifications'];
        $tutor->headline = $validated_attributes['headline'];
        $tutor->gender = $validated_attributes['gender'];
        $tutor->tutor_desc = $validated_attributes['tutor_desc'];
        $tutor->tutor_desc = $validated_attributes['ic_passport_no'];
        if(isset(Auth::user()->ic_passport_no)) {
            $tutor->first_name = $validated_attributes['first_name'];
            $tutor->last_name = $validated_attributes['last_name'];
            $tutor->password = Hash::make($validated_attributes['password']); 
            $tutor->email = $validated_attributes['email'];    
            $tutor->save();
            $tutor->day_times()->sync(request()->timeslot);
        }else{
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
