<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message' , 'student_id' , 'tutor_id' , 'sender'];

    protected $appends = ['owner'];


    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function getOwnerAttribute()
    {
        if($this->sender == 'tutor'){
            return $this->tutor;
        }
        return $this->student;
    }
}
