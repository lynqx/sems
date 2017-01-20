<?php

namespace App\Http\Controllers\Parents;

use App\Events\SmsEvent;
use App\Http\Controllers\LayoutsMainController;
use App\Models\Biodata;
use App\Models\Category;
use App\Models\Gender;
use App\Models\MaritalStatus;
use App\Models\ParentStudent;
use App\Models\Role;
use App\Models\Sms;
use App\Models\User;
use App\Models\UsersRole;
use Exception;
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
        $status = MaritalStatus::all();
        $categorys = Category::all();
        $student_role = Role::query()
            ->where('role', 'Students')
            ->first();

        $students = User::select('*', 'users.id as uid', 'users.firstname as fname', 'users.lastname as lname', 'roles.role as role')
            ->leftjoin('users_roles', 'users.id', '=', 'users_roles.user_id')
            ->leftjoin('roles', 'users_roles.role_id', '=', 'roles.id')
            ->where('users_roles.role_id', $student_role->id)
            ->get();
        return View('parents.create', ['genders' => $genders, 'status' => $status, 'categorys' => $categorys,
            'students' => $students]);
    }


    public function saveCreate()
    {
        $parent_role = Role::query()
            ->where('role', 'Parents')
            ->first();

        $rules = array(
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required',
            'm_status' => 'required',
            'student' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('parents/create')->with('errors', $validator->messages());
        }

        $input = Input::all();
        DB::beginTransaction();
        try {
            $user = new User;
            $user->firstname = $input['firstname'];
            $user->middlename = $input['middlename'];
            $user->lastname = $input['lastname'];
            $user->email = $input['email'];
            $pwd = rand('1000', '1000000');
            $user->password = Hash::make($pwd);
            $user->remember_token = $input['_token'];
            $user->active = '1';
            $user->save();
            $user->roles()->attach($parent_role->id);

            $biodata = new Biodata;
            $biodata->user_id = $user->id;
            $biodata->gender = $input['gender'];
            $biodata->marital_status = $input['m_status'];
            $biodata->date_of_birth = $input['dob'];
            $biodata->mobile = $input['mobile'];
            $biodata->address = $input['address'];
            $biodata->save();
        } catch (Exception $e) {
            DB::rollback();
            throw $e;
        }
        if (config('sms.status')) {
            $sms = new Sms();
            $sms->recipient = Input::get('mobile');
            $sms->message = "Dear " . Input::get('firstname') . ", we have just created an account for you on our students portal";
            $sms->message .="Your password is ".$pwd;
            event(new SmsEvent($sms));
        }
        DB::commit();
        return Redirect::action('Parents\IndexController@home')->with('message', 'Parent successfully added!');

    }
}
