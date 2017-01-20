<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }
}
