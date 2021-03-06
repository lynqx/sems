<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Category;
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
        $user = User::findOrFail($slug);

        $category = Category::findOrFail($user->category->id);
        $subjects = $category->courses()->get();
        $teachers = $category->teacher()->get();

        $fees = FeeList::select('*', 'fee_types.name as fee_type')
            ->leftjoin('fee_types', 'fee_lists.fee_types', '=', 'fee_types.id')
            ->where('fee_lists.categories', '1')
            ->get();

        $totals = [];
//        DB::table('fee_lists as s1')
//            ->select(DB::raw('sum(s1.amount) as totalamount'
//            ))
//            ->where('s1.categories', $category)
//            ->get();

        $sessions = array();
        $genders = Gender::all();
        $status = Status::all();

        return View('students.view', compact('user', 'fees', 'totals', 'teachers', 'subjects', 'genders', 'sessions', 'status'));
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
