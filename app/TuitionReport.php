<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TuitionReport extends Model
{
    public function student_tutor()
    {
        return $this->belongsTo(StudentTutor::class);
    }
}
