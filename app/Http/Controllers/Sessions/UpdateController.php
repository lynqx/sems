<?php

namespace App\Http\Controllers\Subjects;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Course;
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
        $subject = Course::findOrFail($slug);
        return View('subjects.edit', ['subject' => $subject]);
    }

    public function doEdit()
    {
        $subject = Course::findOrFail(Input::get('subject_id'));
        $input = Input::all();
        $subject->course = Input::get('subject');

        $validator = Validator::make($input,
            array(
                'subject' => 'required|min:3'
            )
        );
        if ($validator->fails()) {
            return Redirect::to('subjects')->with('errors', $validator->messages());

        } else {

        }
            if($subject->save()) {
                return Redirect::action('Subjects\IndexController@home')->with('message', 'Subjects edited successfully!');
            } else {
                return Redirect::action('Subjects\IndexController@home')->with('message', 'The subject was not updated. Please try again!');
            }
    }

}
