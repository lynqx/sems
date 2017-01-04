<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\LayoutsMainController;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;


class DeleteController extends LayoutsMainController
{
    public function index($slug)
    {
        $category = Category::findOrFail($slug);
        $category->delete();
        return Redirect::action('Category\IndexController@home');
    }
}
