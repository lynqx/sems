<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = "users";

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'student_course');
    }
}
