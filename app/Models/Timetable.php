<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'class_id');
    }
}
