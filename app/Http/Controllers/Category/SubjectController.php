<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Category;
use App\Models\ClassCourse;
use App\Models\Course;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends LayoutsMainController
{
    public function home($slug)
    {

        $class = Category::findOrFail($slug);

        // error to be fixed
        /*$subjects = ClassCourse::where('class', $slug)
            ->get();*/

        return View('category.subject', compact('subjects', 'class'));
    }

}
