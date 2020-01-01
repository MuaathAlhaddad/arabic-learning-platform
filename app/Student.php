<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use Notifiable;
    
    protected $guard = "student";

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'gender', 'profile_photo',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function tutors()
    {
        return $this->belongsToMany(Tutor::class, 'student_tutor', 'student_id', 'tutor_id')->withPivot('day_time_tutor_id', 'accept_reject', 'complete', 'student_package_id');
    }
    public function packages()
    {
        return $this->belongsToMany(Package::class, 'student_package', 'student_id', 'package_id')->withPivot('paid', 'transaction_id', 'amount');
    }
    public function messages()
    {
    return $this->hasMany(Message::class);
    }

}
