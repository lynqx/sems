<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
use App\Models\Fee;


class IndexController extends LayoutsMainController
{
    //
    public function home()
    {
        //$categorys = Category::with('users')->get();
        //$categorys = Category::find(1);
        $categorys = Category::select('*','categories.cat_id as categories_id', 'users.firstname as fname', 'users.lastname as lname')
            ->leftjoin('users', 'categories.user_id', '=', 'users.id')
            ->orderBy('categories_id', 'desc')
        //->join('users', 'articles.user_id', '=', 'user.id')

        ->get();

        return View('category.home', compact('categorys'));
    }

   /* public function home()
    {
        $categories = \App\Models\Category::with('articles')->get();
        return View('category.home', [
            'categorys' => Category::all()
        ]);
    }*/
}
