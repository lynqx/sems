<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Biodata;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Role;
use App\Models\Status;
use App\Models\StudentBiodata;
use App\Models\StudentClass;
use App\Models\User;
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
        $categories = Category::all();
        return View('students.create', compact('genders', 'status', 'categories'));
    }
    public function saveCreate()
    {
        $student_role = Role::query()->where('role', 'Students')->first();
        $rules = array(
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required',
            'marital_status' => 'required',
            'category' => 'required',
            'date_of_birth' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('students/create')->with('errors', $validator->messages());
        }
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
            $user->active = '1';
            $biodata = new Biodata;
            $biodata->gender_id = $input['gender'];
            $biodata->marital_status = $input['marital_status'];
            $biodata->date_of_birth = $input['date_of_birth'];
            $biodata->mobile = $input['mobile'];
            $biodata->address = $input['address'];
            $user->category()->associate($input['category']);
            $user->save();
            $user->biodata()->save($biodata);
            $user->roles()->attach($student_role->id);
        }catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return Redirect::action('Students\IndexController@home')->with('message', 'Student registered successfully!');
    }
}