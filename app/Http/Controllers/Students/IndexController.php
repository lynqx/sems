<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\LayoutsMainController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends LayoutsMainController
{
    public function home()
    {
        $users = User::select('*', 'users.firstname as fname', 'users.lastname as lname', 'roles.role as role', 'categories.category as class')
            ->leftjoin('user_biodata', 'users.id', '=', 'user_biodata.user_id')
            ->leftjoin('roles', 'users.role', '=', 'roles.id')
            ->leftjoin('genders', 'user_biodata.gender', '=', 'genders.id')
            ->leftjoin('student_class', 'users.id', '=', 'student_class.user_id')
            ->leftjoin('categories', 'student_class.categories_id', '=', 'categories.cat_id')
            ->where('users.role', '4')
            ->orderBy('users.id', 'desc')
            ->get();

        return View('students.home', compact('users'));
    }

}
