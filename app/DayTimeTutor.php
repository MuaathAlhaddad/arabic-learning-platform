<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayTimeTutor extends Model
{
    protected $table = 'day_time_tutor';
    protected $fillable = ['tutor_id', 'day_time_id'];
    public function student_tutor()
    {
        return $this->hasMany(StudentTutor::class)->withPivot('selected');
    }

  

}
