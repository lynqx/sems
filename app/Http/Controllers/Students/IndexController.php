<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends LayoutsMainController
{
    public function home()
    {
        $student_role = Role::query()
            ->where('role', 'Students')
            ->first();

        $users = User::select('*', 'users.id as uid', 'users.firstname as fname', 'users.lastname as lname', 'roles.role as role', 'categories.category as class')
            ->leftjoin('student_biodata', 'users.id', '=', 'student_biodata.user_id')
            ->leftjoin('roles', 'users.role', '=', 'roles.id')
            ->leftjoin('genders', 'student_biodata.gender', '=', 'genders.id')
            ->leftjoin('student_class', 'users.id', '=', 'student_class.user_id')
            ->leftjoin('categories', 'student_class.categories_id', '=', 'categories.cat_id')
            ->where('users.role', $student_role->id)
            ->orderBy('users.id', 'desc')
            ->get();

        return View('students.home', compact('users'));
    }

}
