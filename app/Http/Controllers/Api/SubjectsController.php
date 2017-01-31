<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectsController
{
    public function find(Request $request)
    {
        dd(Auth::user());
        return response()->json();
    }
}
