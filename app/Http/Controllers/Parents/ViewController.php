<?php

namespace App\Http\Controllers\Parents;

use App\Http\Controllers\LayoutsMainController;
use App\Models\Biodata;
use App\Models\FeeList;
use App\Models\Gender;
use App\Models\MaritalStatus;
use App\Models\ParentStudent;
use App\Models\StudentCourse;
use App\Models\TeacherClass;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ViewController extends LayoutsMainController
{
    public function home($slug)
    {
        $parent = User::find($slug);
        $children = $parent->children()->get();
        $genders = Gender::all();
        $status = MaritalStatus::all();

        return View('parents.view', compact('parent', 'children', 'genders', 'status'));
    }

}
