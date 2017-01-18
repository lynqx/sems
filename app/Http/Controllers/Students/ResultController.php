<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\LayoutsMainController;
use App\Models\ExamType;
use App\Models\Result;
use App\Models\StudentSubject;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends LayoutsMainController
{
    public function home($slug)
    {
        $subjects = StudentSubject::select('*', 'student_subject.subject as cid', 'courses.course as subjects')
            ->leftjoin('courses', 'student_subject.subject', '=', 'courses.id')
            ->where('student_subject.student', $slug)
            ->get();

        $types = ExamType::all();

        return View('students.results', ['subjects' => $subjects, 'types' => $types]);
    }
}
