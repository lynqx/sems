<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Category;
use App\Models\ClassCourse;
use App\Models\Course;
use App\Models\Criteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ClassController extends LayoutsMainController
{
    public function home()
    {
        $categorys = Category::all();
        $subjects = Course::all();
        $criteria = Criteria::all();
        return View('subjects.class', ['subjects' => $subjects, 'categorys' => $categorys, 'criteria' => $criteria]);

    }

    public function saveClass()
    {
        $subject = new ClassCourse;
        $input = Input::all();
        $subject->class = $input['class'];
        $subject->course = $input['subject'];
        $subject->criteria = $input['criteria'];
        $subject->status = '1';

        $validator = Validator::make($input,
            array(
                'class' => 'required',
                'subject' => 'required',
                'criteria' => 'required'
            )
        );
        if ($validator->fails()) {
            return Redirect::to('subjects/class')->with('errors', $validator->messages());

        } else {
            //check if not previously added
            $previous = ClassCourse::query()
                ->where('class', $input['class'])
                ->where('course', $input['subject'])
                ->first();

            if ($previous) {
                return Redirect::to('subjects/class')->with('message', 'Subject already exist for the chosen class!');
            } else {

                $subject->save();

                return Redirect::action('Subjects\ClassController@home')->with('message', 'Subject added to class successfully!');

            }
        }
    }
}
