<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $data['notifications'] = Notification::orderby('id', 'DESC')->paginate(6);
        return view('Admin.notifications.index')->with($data);
    }

    public function delete(Notification $notification)
    {
        $notification->delete();
        return redirect(url('/dashboard/notifications'));
    }
}
