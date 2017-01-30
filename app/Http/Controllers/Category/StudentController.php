<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends LayoutsMainController
{
    public function home($slug)
    {

        $class = Category::findOrFail($slug);

        $students = Role::where('name', 'Students')->first()->users()
            ->where('users.category_id', $slug)
            ->get();


        return View('category.student', compact('students', 'class'));
    }

}
