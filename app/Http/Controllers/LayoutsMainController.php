<?php

namespace App\Http\Controllers;

use App\Models\Layout;
use App\Models\Notification;
use App\Models\Role;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;


class LayoutsMainController extends Controller
{
    public $layout = 'layouts.main';
    public $user;
    public $roles;
    public $students;
    public $session;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!is_null($this->layout)) {
                $this->layout = View($this->layout);
            }
            $this->user = Auth::user();
            $this->init();
            $this->roles();
            $this->session();
            return $next($request);
        });
    }

    protected function init()
    {
        $notifications = Notification::where('user_id', $this->user->id)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        view()->share('notifications', $notifications);

        $notificationsCount = Notification::where('user_id', $this->user->id)
            ->get()
            ->count();
        view()->share('notificationsCount', $notificationsCount);
    }

    protected function roles()
    {
        $roles = Role::where('id', $this->user->role)
            ->get();
        view()->share('roles', $roles);
    }

    protected function students()
    {
        $students = Role::where('role','Students')->first()->users()->count();
        view()->share('studentscount', $students);
    }

    protected function session()
    {
        $session = Session::where('status', '1')
            ->get()->first();
        view()->share(compact('session'));
    }


}
