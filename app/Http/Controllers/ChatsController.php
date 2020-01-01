<?php

namespace App\Http\Controllers;

use App\Tutor;
use App\Message;
use App\Student;
use App\Events\MessageSent;
use App\StudentTutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatsController extends Controller
{
   

    public function fetchMessages()
    {
        return Message::with('student')->get();
    }

    public function sendMessage(Request $request)
    {
        // dd($request->all());
        // $student = Auth::user();

        // $message = $student->messages()->create([
        //     'message' => $request->input('message')
        // ]);


        $message = Message::create($request->all());

        $tutor = Tutor::findOrFail($request->tutor_id);
        $student = Student::findOrFail($request->student_id);

        broadcast(new MessageSent($tutor, $student, $message))->toOthers();

        return $message;
    }


    public function room($tutor_id , $student_id)
    {
        $guard = 'tutor';

        if(auth()->guard('student')->check()){
            $guard = 'student';
        //     if(auth()->guard('student')->user()->id !== $student_id){
        //         abort(404);
        //     }

        }
        $tutor = Tutor::findOrFail($tutor_id);
        $student = Student::findOrFail($student_id);
        
        $messages = Message::where('student_id' , $student->id)->where('tutor_id', $tutor->id)->orderBy('created_at', 'DESC')->get();

        return view('student_tutor.chat_room', compact('tutor' , 'student' , 'messages' , 'guard'));
    }

    public function close_room(Request $request) {
        $student_tutor = StudentTutor::where('tutor_id',$request->tutor_id)
                                    ->where('student_id', $request->student_id)
                                    ->first();
        $student_tutor->complete = 1;
        $student_tutor->save();

        return redirect()->route('tutors.show');

    }
    public function exit_room () {
        return redirect()->route('students.show');
    }
}
