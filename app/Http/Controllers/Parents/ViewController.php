<?php

namespace App\Http\Controllers\Parents;

use App\Http\Controllers\LayoutsMainController;
use App\Models\FeeList;
use App\Models\ParentStudent;
use App\Models\StudentCourse;
use App\Models\TeacherClass;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ViewController extends LayoutsMainController
{
    public function home($slug)
    {
        $users = User::select('*', 'users.id as uid', 'users.firstname as fname', 'users.lastname as lname', 'roles.role as role')
            ->leftjoin('user_biodata', 'users.id', '=', 'user_biodata.user_id')
            ->leftjoin('roles', 'users.role', '=', 'roles.id')
            ->leftjoin('genders', 'user_biodata.gender', '=', 'genders.id')
            ->where('users.id', $slug)
            ->limit('1')
            ->get();
        foreach ($users as $user) {
            $parent = $user['uid'];
        }
        $students = ParentStudent::select('*', 'users.firstname as fname', 'users.lastname as lname')
            ->leftjoin('users', 'parent_student.student', '=', 'users.id')
            ->leftjoin('user_biodata', 'parent_student.student', '=', 'user_biodata.user_id')
            ->leftjoin('genders', 'user_biodata.gender', '=', 'genders.id')
            ->where('parent_student.parent', $parent)
            ->get();

        return View('parents.view', ['users' => $users, 'students' => $students]);
    }


    public function doEdit()
    {
        $category = Category::findOrFail(Input::get('cat_id'));
        $input = Input::all();
        $category->category = Input::get('category');
        $category->user_id = Input::get('teacher');

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
        if ($category->save()) {
            return Redirect::action('Category\IndexController@home')->with('message', 'Class edited successfully!');
        } else {
            return Redirect::action('Category\IndexController@home')->with('message', 'The class was not updated. Please try again!');
        }
    }

}
