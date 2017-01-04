<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public $primaryKey = 'cat_id';
    protected $table = 'categories';

    public static function table($string)
    {
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
