<?php

namespace App\Http\Controllers;

class NotificationController extends Controller
{
    public function index()
    {
        auth()->user()->unreadNotifications->markAsRead();

        $notifications = auth()->user()->notifications;

        return view('notifications.index', compact('notifications'));
    }
}
