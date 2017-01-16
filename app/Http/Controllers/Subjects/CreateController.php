<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;


class CreateController extends LayoutsMainController
{
    public function home()
    {
        return View('subjects.create');
    }


    public function saveCreate()
    {
        $subject = new Course;
        $input = Input::all();
        $subject->course = $input['subject'];

        $validator = Validator::make($input,
            array(
                'subject' => 'required|unique:courses,course|min:3'
            )
        );
        if ($validator->fails()) {
            return Redirect::to('subjects/create')->with('errors', $validator->messages());

        } else {
            $subject->save();

            return Redirect::action('Subjects\IndexController@home')->with('message', 'Subject created successfully!');

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
