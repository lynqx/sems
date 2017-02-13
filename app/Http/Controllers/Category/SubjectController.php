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
        // error to be fixed
        // supposed to output the subjects available to this class
        // present in category/view subjects
       /* $user = User::find($slug);
        $category = Category::find($user->category->id);
        $subjects = $category->courses()->get();
       */

        $class = Category::findOrFail($slug);
        $category = Category::findOrFail($class->id);
        $subjects = $category->courses()->get();

           return View('category.subject', compact('subjects', 'category', 'class'));
    }

}

