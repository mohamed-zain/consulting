<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Notifications\Notification;
use App\Notifications\AlertNotification;
class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
