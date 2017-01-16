<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Support\Facades\Redirect;
use App\Models\Fee;


class IndexController extends LayoutsMainController
{
    //
    public function home()
    {
        $subjects = Course::all();

        return View('subjects.home', compact('subjects'));
    }

    /* public function home()
     {
         $categories = \App\Models\Category::with('articles')->get();
         return View('category.home', [
             'categorys' => Category::all()
         ]);
     }*/
}
