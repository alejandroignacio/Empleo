<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    // Método para listar las notificaciones
    public function index()
    {
        $notifications = auth()->user()->unreadNotifications;
        return view('notifications.index', ['notifications' => $notifications]);
    }
    

    // Método para marcar una notificación como leída
    public function markAsRead($id)
    {
        $notification = auth()->user()->notifications()->find($id);
        if($notification) {
            $notification->markAsRead();
        }

        return back();
    }
}
