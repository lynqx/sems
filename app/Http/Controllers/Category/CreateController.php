<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\LayoutsMainController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\lga;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;


class CreateController extends LayoutsMainController
{
    public function home()
    {
        $users = User::where('role', '3')
            ->get();
        return View('category.create', ['users' => $users]);
    }


    public function saveCreate()
    {
        $category = new Category;
        $input = Input::all();
        $category->category = $input['category'];
        $category->user_id = $input['teacher'];
        $category->status = '1';

        $validator = Validator::make($input,
            array(
                'category' => 'required|unique:categories,category|min:3',
                'teacher' => 'required'
            )
        );
        if ($validator->fails()) {
            return Redirect::to('category/create')->with('errors', $validator->messages());

        } else {
            $category->save();

            return Redirect::action('Category\IndexController@home')->with('message', 'Class created successfully!');

        }
    }


    public function edit()
    {
        echo "Quite easily done";
    }


    public function delete(Category $category)
    {
        return View('category/delete', compact('category'));
    }


    public function doDelete()
    {
        $category = Category::findOrFail(Input::get('cat_id'));
        $category->delete();

        return Redirect::action('CategorysController@home');
    }


}
