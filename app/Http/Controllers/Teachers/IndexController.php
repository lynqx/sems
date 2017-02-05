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
        $teachers = Role::where('name', 'Teachers')
            ->first()->users()->get();

        return View('teachers.home', compact('teachers'));
    }
}
