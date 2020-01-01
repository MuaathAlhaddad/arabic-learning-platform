<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public $timestamps = false;
    
    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_package', 'package_id', 'student_id')->withPivot('paid', 'transaction_id', 'amount');

    }
}
