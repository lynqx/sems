<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Category;
use App\Models\Course;
use App\Models\Gender;
use App\Models\Status;
use App\Models\StudentBiodata;
use App\Models\StudentClass;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CreateController extends LayoutsMainController
{
    public function home()
    {
        $genders = Gender::all();
        $status = Status::all();
        $categorys = Category::all();
        return View('students.create', ['genders' => $genders, 'status' => $status, 'categorys' => $categorys]);
    }


    public function saveCreate()
    {
        $rules = array(
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required',
            'm_status' => 'required',
            'category' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('students/create')->with('errors', $validator->messages());

        } else {

            // Start transaction!
            DB::beginTransaction();

            try {
                $user = new User;
                $input = Input::all();
                $user->firstname = $input['firstname'];
                $user->middlename = $input['middlename'];
                $user->lastname = $input['lastname'];
                $user->email = $input['email'];
                $pwd = rand('1000', '1000000');
                $user->password = Hash::make($pwd);
                $user->remember_token = $input['_token'];
                $user->role = '4';
                $user->active = '1';
                $user->save();
            } catch (ValidationException $e) {
                // Rollback and then redirect
                // back to form with errors
                DB::rollback();
                return Redirect::to('students/create')
                    ->withErrors($e->getErrors())
                    ->withInput();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }

            try {
                $insertedId = $user->id;
                $biodata = new StudentBiodata;

                $biodata->user_id = $insertedId;
                $biodata->gender = $input['gender'];
                $biodata->m_status = $input['m_status'];
                $biodata->dob = $input['dob'];
                $biodata->mobile = $input['mobile'];
                $biodata->address = $input['address'];;
                $biodata->save();
            } catch (ValidationException $e) {
                // Rollback and then redirect
                // back to form with errors
                DB::rollback();
                return Redirect::to('students/create')
                    ->withErrors($e->getErrors())
                    ->withInput();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }

            try {
                $insertedId = $user->id;
                $studentclass = new StudentClass;

                $studentclass->user_id = $insertedId;
                $studentclass->categories_id = $input['category'];
                $studentclass->save();
            } catch (ValidationException $e) {
                // Rollback and then redirect
                // back to form with errors
                DB::rollback();
                return Redirect::to('students/create')
                    ->withErrors($e->getErrors())
                    ->withInput();
            } catch (\Exception $e) {
                DB::rollback();
                throw $e;
            }


// If we reach here, then
// data is valid and working.
// Commit the queries!
            DB::commit();

            return Redirect::action('Students\IndexController@home')->with('message', 'Student registered successfully!');

        }
    }

    public function subject()
    {
        $courses = Course::all();
        return View('students.subjects', ['courses' => $courses]);
    }

}
