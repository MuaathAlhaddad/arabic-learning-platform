<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_Usage_Hours extends Model
{
    protected $table = 'student__usage__hours';
    protected $fillable = ['student_package_id', 'consumed_hours', 'remaining_hours']; 
    public function student_package()
    {
        return $this->belongsTo(StudentPackage::class);
    }
}
