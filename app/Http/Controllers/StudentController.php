<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Models\lga;
use App\Models\gender;
use Illuminate\Support\Facades\Validator;

class StudentController extends LayoutsMainController
{
    //
    public function View()
    {
        $lgas = Lga::all();
        $categorys = Category::all();
        $genders = Gender::all();
        return View('student.create', ['lgas' => $lgas, 'categorys' => $categorys, 'genders' => $genders]);
    }


    public function create(Request $request)
    {
        $rules = array(
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('signup')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            $user = new User;
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->save();
            if ($request->ajax()) {
                return json_encode($user);
            }
            return view('category/create');
        }
    }
}
