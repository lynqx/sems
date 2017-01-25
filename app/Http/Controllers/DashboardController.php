<?php

namespace App\Http\Controllers;

use App\Events\NotificationsEvent;
use App\Mail\TimeTable;
use App\Models\Category;
use App\Models\Course;
use App\Models\Lga;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DashboardController extends LayoutsMainController
{
    public function index()
    {
        $subjects = Course::all()->count();
        $payments = []; //Payment::all();
        $students = Role::where('name','Students')->first()->users()->count();
        $teachers = Role::where('name','Teachers')->first()->users()->count();
        $newstudents = Role::where('name','Students')
            //->where('created_at','Students') where date of creation falls within the current session and term
            ->first()->users()->count();

        $totals = [];
//        DB::table('payments as s1')
//            ->select(DB::raw('sum(s1.amount) as totalamount'
//            ))
//            ->where('s1.session_id', '1')
//            ->get();

        return View('dashboard.home', [
            'user'=>$this->user,
            'students' => $students,
            'newstudents' => $newstudents,
            'teachers' => $teachers,
            'subjects' => $subjects,
            'payments' => $payments,
            'totals' => $totals
        ]);
    }

        protected function students()
    {
        $students = Role::where('role','Students')->first()->users()->count();
        view()->share('studentscount', $students);
    }

}

        #######################
//      ## Send Notifications #
        #######################
//        $notification = new Notification();
//        $notification->user_id = $request->user()->id;
//        $notification->status = '1';
//        $notification->nature = '1';
//        if(cat->save){
//        $notification->notification = 'Thank you for hollering at your boy';
//        }else{
//        $notification->notification = 'You failed just yet again';
//        }
//        event(new NotificationsEvent($notification));


          ############
//        #Send mail #
          ############
        //Mail::to($request->user()->email)->send(new TimeTable((new Lga())->find(2)));

