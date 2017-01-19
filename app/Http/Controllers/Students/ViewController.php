<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\LayoutsMainController;
use App\Models\FeeList;
use App\Models\Gender;
use App\Models\Status;
use App\Models\StudentSubject;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ViewController extends LayoutsMainController
{
    public function home($slug)
    {
        $users = User::select('*', 'users.id as uid', 'users.firstname as fname', 'users.lastname as lname', 'roles.role as role',
            'categories.category as class', 'categories.teacher as teacher', 'student_biodata.gender as sex')
            ->leftjoin('student_biodata', 'users.id', '=', 'student_biodata.user_id')
            ->leftjoin('user_contact', 'users.id', '=', 'user_contact.user_id')
            ->leftjoin('users_roles', 'users.id', '=', 'users_roles.user_id')
            ->leftjoin('roles', 'users_roles.role_id', '=', 'roles.id')
            ->leftjoin('genders', 'student_biodata.gender', '=', 'genders.id')
            ->leftjoin('student_class', 'users.id', '=', 'student_class.user_id')
            ->leftjoin('parent_student', 'users.id', '=', 'parent_student.student')
            ->leftjoin('categories', 'student_class.categories_id', '=', 'categories.cat_id')
            ->leftjoin('fee_lists', 'categories.cat_id', '=', 'fee_lists.categories')
            ->leftjoin('fee_types', 'fee_lists.fee_types', '=', 'fee_types.id')
            ->where('users.id', $slug)
            ->limit('1')
            ->get();

//        $selected = $users['sex'];

        if (isset($users) && $users != "") {
            foreach ($users as $user) {
                $category = $user['cat_id'];
                $teacher = $user['teacher'];
                $parent = $user['parent'];
            }
        } else {
            return Redirect::to('students');
        }

        $fees = FeeList::select('*', 'fee_types.name as fee_type')
            ->leftjoin('fee_types', 'fee_lists.fee_types', '=', 'fee_types.id')
            ->where('fee_lists.categories', $category)
            ->get();

        $totals = DB::table('fee_lists as s1')
            ->select(DB::raw('sum(s1.amount) as totalamount'
            ))
            ->where('s1.categories', $category)
            ->get();

        $teachers = User::select('*', 'users.id as uid', 'users.firstname as fname', 'users.lastname as lname',
            'user_biodata.mobile as phone')
            ->leftjoin('user_biodata', 'users.id', '=', 'user_biodata.user_id')
            ->leftjoin('genders', 'user_biodata.gender', '=', 'genders.id')
            ->where('users.id', $teacher)
            ->get();

        $parents = User::select('*', 'users.id as uid', 'users.firstname as fname', 'users.lastname as lname',
            'user_biodata.mobile as phone')
            ->leftjoin('user_biodata', 'users.id', '=', 'user_biodata.user_id')
            ->leftjoin('user_contact', 'users.id', '=', 'user_contact.user_id')
            ->where('users.id', $parent)
            ->get();

        $subjects = StudentSubject::select('*')
            ->leftjoin('courses', 'student_subject.subject', '=', 'courses.id')
            ->where('student_subject.student', $slug)
            ->get();

        $genders = Gender::all();
        $status = Status::all();

        return View('students.view', ['users' => $users, 'fees' => $fees, 'totals' => $totals, 'teachers' => $teachers, 'subjects' => $subjects, 'genders' => $genders, 'status' => $status,
            'parents' => $parents]);
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
