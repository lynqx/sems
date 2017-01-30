<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Lga;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class UpdateController extends LayoutsMainController
{
    public function home($slug)
    {
        $students = User::findOrFail($slug);
        $users = User::where('role', '3')
            ->get();
        return View('category.edit', ['category' => $category, 'users' => $users]);
    }

    public function doEdit()
    {
        $category = Category::findOrFail(Input::get('cat_id'));
        $input = Input::all();
        $category->category = Input::get('category');
        $category->teacher = Input::get('teacher');

        $validator = Validator::make($input,
            array(
                'category' => 'required|min:3',
                'teacher' => 'required|numeric'
            )
        );
        if ($validator->fails()) {
            return Redirect::to('category')->with('errors', $validator->messages());

        } else {

        }
            if($category->save()) {
                return Redirect::action('Category\IndexController@home')->with('message', 'Class edited successfully!');
            } else {
                return Redirect::action('Category\IndexController@home')->with('message', 'The class was not updated. Please try again!');
            }
    }

}
