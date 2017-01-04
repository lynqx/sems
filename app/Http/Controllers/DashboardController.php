<?php

namespace App\Http\Controllers;

use App\Events\NotificationsEvent;
use App\Mail\TimeTable;
use App\Models\Category;
use App\Models\Lga;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;

class DashboardController extends LayoutsMainController
{
    public function index(Request $request)
    {

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


        return View('dashboard.home', [
            'user'=>$this->user
        ]);
    }
}
