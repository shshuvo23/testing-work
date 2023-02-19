<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\Welcomenotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class HomeController extends Controller
{
    public function index()
    {

        $user = User::first();
        Notification::send($user, new Welcomenotification);
        dd('done');
    }
}
