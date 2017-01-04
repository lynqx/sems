<?php

namespace App\Http\Controllers\Fee;

use App\Http\Controllers\LayoutsMainController;
use Illuminate\Support\Facades\Redirect;
use App\Models\Fee;


class IndexController extends LayoutsMainController
{
    //
    public function home()
    {
        return View('fee.home', [
            'fees' => Fee::all()
        ]);
    }
}
