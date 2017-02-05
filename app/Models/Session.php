<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public function term()
    {
        return $this->belongsTo(Term::class,'id');
    }
}
