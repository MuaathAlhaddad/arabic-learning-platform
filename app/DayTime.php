<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayTime extends Model
{
    protected $table = 'day_times';
    public $timestamps = false;
    
    public function tutors()
    {
        return $this->belongsToMany(Tutor::class, 'day_time_tutor', 'day_time_id', 'tutor_id');
    }

  
}
