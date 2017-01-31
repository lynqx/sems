<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'class_course');
    }
}
