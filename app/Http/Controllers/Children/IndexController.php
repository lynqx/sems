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
            ->where('name', 'Students')
            ->first();

        // fix issues
        
        $users = User::select('*', 'users.id as uid', 'users.firstname as fname', 'users.lastname as lname', 'roles.name as role')
            ->leftjoin('biodatas', 'users.id', '=', 'biodatas.user_id')
            ->leftjoin('users_roles', 'users.id', '=', 'users_roles.user_id')
            ->leftjoin('roles', 'users_roles.role_id', '=', 'roles.id')
            ->leftjoin('genders', 'biodatas.gender_id', '=', 'genders.id')
            ->where('users.parent_id', 'parent_id')
            ->orderBy('users.id', 'desc')
            ->get();

        return View('children.home', compact('users'));
    }
}
