<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function postApiLogin(Request $request)
    {
        if (!$request->ajax()) {
            $error = "You need to send an ajax request.";
            return response()->json($error, 400)
                ->header('Content-Type', 'application/json');
        }
        $rules = array(
            'email' => 'required|email|max:255',
            'password' => 'required'
        );
        $cred = Input::only('email', 'password');
        $cred['active'] = 1;
        $validator = Validator::make($cred, $rules);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400)
                ->header('Content-Type', 'application/json');
        }
        if (Auth::attempt($cred)) {
            $user = Auth::user();
            $user->redirect_url = '/';
            return response()->json($user, 200)
                ->header('Content-Type', 'application/json');
        } else {
            return response()->json(['message'=>"Username or password is incorrect."], 400)
                ->header('Content-Type', 'application/json');
        }
    }


    public function logoff()
    {
        return View('auth.logoff');
    }
}
