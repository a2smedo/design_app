<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

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

    public function allSeen( )
    {
        Notification::where('is_read', '=', 0)->update([
            'is_read' => 1,
        ]);
    }
}
