<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tutor extends Authenticatable
{
    use Notifiable;
    
    protected $guard = "tutor";

    protected $fillable = [
        'first_name','last_name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function day_times() {
        return $this->belongsToMany(DayTime::class, 'day_time_tutor', 'tutor_id', 'day_time_id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_tutor', 'tutor_id', 'student_id')->withPivot('day_time_tutor_id', 'accept_reject', 'complete', 'student_package_id');
    }

    // public static function boot() {
    //     parent::boot();

    //     static::deleting(function($tutor) { // before delete() method call this
    //          $tutor->day_times()->delete();
    //          // do the rest of the cleanup...
    //     });
    // }
  
}
