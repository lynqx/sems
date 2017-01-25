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
        return View('parents.create', compact('genders', 'status'));
    }

    public function saveCreate()
    {
        $parent_role = Role::query()
            ->where('name', 'Parents')
            ->first();
        $rules = array(
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'gender' => 'required',
            'marital_status' => 'required',
            'children' => 'required',
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
            $user->api_token = str_random(60);
            $user->active = '1';
            $user->save();
            $user->roles()->attach($parent_role->id);
            $children = $input['children'];
            foreach($children as $child) {
                $student = User::find($child);
                $student->parent()->associate($user->id);
                $student->save();
            }
            $biodata = new Biodata;
            $biodata->user_id = $user->id;
            $biodata->gender_id = $input['gender'];
            $biodata->marital_status = $input['marital_status'];
            $biodata->date_of_birth = $input['date_of_birth'];
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
