<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\LayoutsMainController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateController extends LayoutsMainController
{
    public function home()
    {
        $users = User::select('*', 'users.firstname as fname', 'users.lastname as lname', 'roles.role as role')
            ->leftjoin('user_biodata', 'users.id', '=', 'user_biodata.user_id')
            ->leftjoin('roles', 'users.role', '=', 'roles.id')
            ->where('users.role', '4')
            ->orderBy('roles.id', 'desc')
            ->get();

        return View('students.home', compact('users'));
    }
}
