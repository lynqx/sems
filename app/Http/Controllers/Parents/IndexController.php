<?php

namespace App\Http\Controllers\Parents;

use App\Http\Controllers\LayoutsMainController;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends LayoutsMainController
{
    public function home()
    {
        $users = User::select('*', 'users.id as uid', 'users.firstname as fname', 'users.lastname as lname', 'roles.role as role',
            'genders.gender as gender')
            ->leftjoin('user_biodata', 'users.id', '=', 'user_biodata.user_id')
            ->leftjoin('roles', 'users.role', '=', 'roles.id')
            ->leftjoin('genders', 'user_biodata.gender', '=', 'genders.id')
            ->where('users.role', '2')
            ->orderBy('users.id', 'desc')
            ->get();

        return View('parents.home', compact('users'));
    }
}
