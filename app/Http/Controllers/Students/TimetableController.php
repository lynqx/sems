<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Role;
use App\Models\Timetable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimetableController extends LayoutsMainController
{
    public function home()
    {
        $mondays = Timetable::all();
        $tuesdays = Timetable::all();

        return View('students.timetable', [
            'mons' => $mondays,
            'tues' => $tuesdays
        ]);

    }

}
