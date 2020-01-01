<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentPackage extends Model
{
    protected $table = "student_package";
    
    protected $fillable = [
        'student_id', 'package_id', 'transaction_id', 'paid'
    ];
    public function student_usage_hours()
    {
        return $this->hasOne(Student_Usage_Hours::class);    
    }
}
