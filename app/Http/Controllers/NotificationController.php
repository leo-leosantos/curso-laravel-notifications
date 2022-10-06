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
        
       $notifications =  $request->user()->comments;

       //dd($notifications);

       $return = response()->json(compact('notifications'));

       return $return;
    }
}
