<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentTutor extends Model
{
    protected $table = 'student_tutor';
    protected $fillable = [
        'tutor_id', 'student_id', 'day_time_tutor_id', 'accept_reject', 'complete', 'student_package_id', 'student_materials',
    ];
    public function day_time_tutor(){
        return $this->belongsTo(DayTimeTutor::class);
    }
    public function tuition_report(){
        return $this->hasMany(TuitionReport::class);
    }

}
