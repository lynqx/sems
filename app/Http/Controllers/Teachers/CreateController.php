<?php

namespace App\Http\Controllers\Teachers;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Biodata;
use App\Models\Gender;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class CreateController extends LayoutsMainController
{
    public function home()
    {
        $genders = Gender::all();
        $status = Status::all();
        return View('teachers.create', ['genders' => $genders, 'status' => $status]);
    }


    public function saveCreate()
    {
        $teacher_role = Role::query()
            ->where('role', 'Teachers')
            ->first();

        $rules = array(
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required',
            'm_status' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('teachers/create')->with('errors', $validator->messages());
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
            $user->roles()->attach($teacher_role->id);

            $biodata = new Biodata;
            $biodata->user_id = $user->id;
            $biodata->gender_id = $input['gender'];
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
            $sms->message = "Dear " . Input::get('firstname') . ", we have just created an account for you on the school portal";
            $sms->message .="Your password is ".$pwd;
            event(new SmsEvent($sms));
        }
        DB::commit();
        return Redirect::action('Teachers\IndexController@home')->with('message', 'Parent successfully added!');

    }
}
