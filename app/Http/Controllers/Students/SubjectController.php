<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Category;
use App\Models\ClassCourse;
use App\Models\Course;
use App\Models\Role;
use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SubjectController extends LayoutsMainController
{
    public function home($slug)
    {
        $user = User::find($slug);
        $category = Category::find($user->category->id);
        $courses = $category->courses()->get();
        return View('students.subjects', compact('user', 'courses'));
    }

    public function saveSubject()
    {
        $rules = array(
            'student' => 'required',
            'courses' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('students')->with('errors', $validator->messages());
        }

        DB::beginTransaction();
        try {
            $input = Input::all();
            $student = Student::find($input['student']);
            $courses = $input['courses'];
            foreach($courses as $course){
                $student->courses()->attach($course,array('session_id' => 1));
                $student->save();
            }
        } catch (\Exception $e) {
            DB::rollback();
            return Redirect::to('students')->withErrors($e->getErrors())->withInput();
        }
        DB::commit();
        return Redirect::action('Students\IndexController@home')->with('message', 'Subjects added to student successfully!');

    }

}
