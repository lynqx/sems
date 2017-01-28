<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $teachers = Role::where('name', 'Teachers')->first()->users()->get();
        return View('category.create', compact('teachers'));
    }


    public function saveCreate()
    {
        $input = Input::all();

        $validator = Validator::make($input,
            array(
                'category' => 'required|unique:categories,name|min:3',
                'teacher' => 'required'
            )
        );
        if ($validator->fails()) {
            return Redirect::to('category/create')->with('errors', $validator->messages());
        }
        try {
            $category = new Category;
            $category->name = $input['category'];
            $category->teacher_id = $input['teacher'];
            $category->save();
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        return Redirect::action('Category\IndexController@home')->with('message', 'Class created successfully!');
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
