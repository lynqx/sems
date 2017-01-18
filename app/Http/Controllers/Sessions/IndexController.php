<?php

namespace App\Http\Controllers\Sessions;

use App\Http\Controllers\LayoutsMainController;
use Illuminate\Support\Facades\Redirect;


class IndexController extends LayoutsMainController
{
    //
    public function home()
    {
        $sessions = Session::all();

        return View('sessions.home', compact('sessions'));
    }

}
