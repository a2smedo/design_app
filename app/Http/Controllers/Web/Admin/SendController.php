<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SendController extends Controller
{
    public function create()
    {
        
        $data['users'] = User::where('rule_id', 3)->get();
        return view('Admin.notifications.send')->with($data);
    }

    public function send(Request $request)
    {

    }
}
