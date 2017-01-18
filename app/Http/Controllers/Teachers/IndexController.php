<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends LayoutsMainController
{
    public function home()
    {
        $teacher_role = Role::query()
            ->where('role', 'Teachers')
            ->first();

        $users = User::select('*', 'users.id as uid', 'users.firstname as fname', 'users.lastname as lname', 'roles.role as role', 'categories.category as class')
            ->leftjoin('user_biodata', 'users.id', '=', 'user_biodata.user_id')
            ->leftjoin('roles', 'users.role', '=', 'roles.id')
            ->leftjoin('genders', 'user_biodata.gender', '=', 'genders.id')
            ->leftjoin('categories', 'users.id', '=', 'categories.teacher')
            ->where('users.role', $teacher_role->id)
            ->orderBy('users.id', 'desc')
            ->get();

        return View('teachers.home', compact('users'));
    }
}
