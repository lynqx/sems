<?php

namespace App\Http\Controllers\Children;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Role;
use App\Models\User;

class IndexController extends LayoutsMainController
{
    //
    public function home()
    {
        $student_role = Role::query()
            ->where('role', 'Students')
            ->first();

        $users = User::select('*', 'users.id as uid', 'users.firstname as fname', 'users.lastname as lname', 'roles.role as role', 'categories.category as class')
            ->leftjoin('student_biodata', 'users.id', '=', 'student_biodata.user_id')
            ->leftjoin('users_roles', 'users.id', '=', 'users_roles.user_id')
            ->leftjoin('roles', 'users_roles.role_id', '=', 'roles.id')
            ->leftjoin('genders', 'student_biodata.gender', '=', 'genders.id')
            ->leftjoin('student_class', 'users.id', '=', 'student_class.user_id')
            ->leftjoin('categories', 'student_class.categories_id', '=', 'categories.cat_id')
            ->where('users_roles.role_id', $student_role->id)
            ->orderBy('users.id', 'desc')
            ->get();

        return View('children.home', compact('users'));
    }
}