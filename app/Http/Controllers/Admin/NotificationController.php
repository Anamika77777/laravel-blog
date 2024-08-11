<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function markAsRead(){
        auth()->guard('admin')->user()->unreadnotifications->markAsRead();
        return redirect()->back();
    }


}
