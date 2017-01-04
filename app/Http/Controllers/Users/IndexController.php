<?php

namespace App\Http\Controllers\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends LayoutsMainController
{
    public function home()
    {
        $users = User::select('*', 'users.firstname as fname', 'users.lastname as lname', 'roles.role as role')
            ->leftjoin('roles', 'users.role', '=', 'roles.id')
            ->orderBy('roles.id', 'desc')
            ->get();

        return View('user.home', compact('users'));
    }
}
