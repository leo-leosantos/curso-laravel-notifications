<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function notifications(Request $request)
    {
        
       $notifications =  $request->user()->unreadNotifications;

       //dd($notifications);

       $return = response(compact('notifications'));

       return $return;
    }


    public function markAsRead(Request $request)
    {
        
        $notification = $request->user()
                        ->notifications()
                        ->where('id', $request->id)
                        ->first();

        //dd($notification);
        if($notification){
            $notification->markAsRead();
        }

    }

    public function markAllAsRead(Request $request)
    {

        $request->user()->unreadNotifications->markAsRead();
    }
}
