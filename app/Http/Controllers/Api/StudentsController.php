<?php

namespace App\Http\Controllers\Api;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController
{
    public function search(Request $request)
    {
        $student_role = Role::query()
            ->where('name', 'Students')
            ->first();
        $names = explode(" ", $request->input('q'));
        return response()->json(
            User::whereHas('roles', function ($q) use ($student_role) {
                $q->whereId($student_role->id);
            })
                ->where(function ($q) use ($names){
                    foreach($names as $name) {
                        $q->where('firstname', 'like', '%' . $name . '%');
                    }
                })
                ->orWhere(function ($q) use ($names){
                    foreach($names as $name) {
                        $q->where('lastname', 'like', '%' . $name . '%');
                    }
                })
                ->get()
        );
    }
}
