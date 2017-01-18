<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\LayoutsMainController;
use App\Models\ClassCourse;
use App\Models\Course;
use App\Models\Role;
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
        $users = User::select('*', 'users.id as uid', 'users.firstname as fname', 'users.lastname as lname', 'roles.role as role',
            'categories.category as class','categories.cat_id as c_id', 'categories.teacher as teacher')
            ->leftjoin('roles', 'users.role', '=', 'roles.id')
            ->leftjoin('student_class', 'users.id', '=', 'student_class.user_id')
            ->leftjoin('categories', 'student_class.categories_id', '=', 'categories.cat_id')
            ->where('users.id', $slug)
            ->limit('1')
            ->get();

        $core = Course::select('*', 'courses.course as subject', 'class_course.course as cid')
            ->leftjoin('class_course', 'courses.id', '=', 'class_course.course')
            ->where('class_course.class', '1')
            ->where('class_course.criteria', '1')
            ->get();

        $compulsory = Course::select('*', 'courses.course as subject', 'class_course.course as cid')
            ->leftjoin('class_course', 'courses.id', '=', 'class_course.course')
            ->where('class_course.class', '1')
            ->where('class_course.criteria', '2')
            ->get();

        $required = Course::select('*', 'courses.course as subject', 'class_course.course as cid')
            ->leftjoin('class_course', 'courses.id', '=', 'class_course.course')
            ->where('class_course.class', '1')
            ->where('class_course.criteria', '3')
            ->get();

        $elective = Course::select('*', 'courses.course as subject', 'class_course.course as cid')
            ->leftjoin('class_course', 'courses.id', '=', 'class_course.course')
            ->where('class_course.class', '1')
            ->where('class_course.criteria', '4')
            ->get();
        return View('students.subjects', ['users' => $users, 'core' => $core, 'compulsory' => $compulsory, 'required' => $required, 'elective' => $elective]);
    }

    public function saveSubject()
    {
        /*$sms = new Sms();
        $sms->recipient = Input::get('mobile');
        $sms->message = "Dear " . Input::get('firstname') . ", we have just created an account for you on our students portal";
        event(new SmsEvent($sms));*/
        $student_role = Role::query()
            ->where('role', 'Students')
            ->first();

        $rules = array(
            'student' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('students')->with('errors', $validator->messages());

        } else {

            // Start transaction!
            DB::beginTransaction();

            try { // do this for as many subjects selected
                $user = new StudentCourse();
                $input = Input::all();
                $user->student = $input['student'];
                $user->subject = $input['checkbox1'];
                $user->save();
            } catch (ValidationException $e) {
                // Rollback and then redirect
                // back to form with errors
                DB::rollback();
                return Redirect::to('students')
                    ->withErrors($e->getErrors())
                    ->withInput();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }

            try {
                $insertedId = $user->id;
                $parentstudent = new ParentStudent;
                $parentstudent->parent = $insertedId;
                $parentstudent->student = $input['student'];
                $parentstudent->save();
            } catch (ValidationException $e) {
                // Rollback and then redirect
                // back to form with errors
                DB::rollback();
                return Redirect::to('parents/create')
                    ->withErrors($e->getErrors())
                    ->withInput();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }
           /* $sms = new Sms();
            $sms->recipient = Input::get('mobile');
            $sms->message = "Dear " . Input::get('firstname') . ", we have just created an account for you on our students portal";
            event(new SmsEvent($sms));*/

// If we reach here, then
// data is valid and working.
// Commit the queries!
            DB::commit();

            return Redirect::action('Students\IndexController@home')->with('message', 'Subjects added to student successfully!');

        }
    }

}
