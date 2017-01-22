<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use App\Models\Fee;


class IndexController extends LayoutsMainController
{
    public function home()
    {
        $categories = Category::all();
        return View('category.home', compact('categories'));
    }

   /* public function home()
    {
        $categories = \App\Models\Category::with('articles')->get();
        return View('category.home', [
            'categorys' => Category::all()
        ]);
    }*/
}
