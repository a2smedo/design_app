<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Cat;
use App\Models\User;
use App\Models\Order;
use App\Models\Design;
use App\Models\Package;
use App\Models\Competition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;

class HomeController extends Controller
{
    public function index()
    {
        //cards
        $data['packages_count'] = Package::count();
        $data['cats_count'] = Cat::count();
        $data['designs_count'] = Design::count();
        $data['users_count'] = User::where('rule_id', 3)->count();
        $data['competitions_count'] = Competition::count();
        $data['orders_count'] = Order::count();

        $data['designs'] = Design::orderBy('id', 'DESC')->limit(5)->active()->get();
        $data['orders'] = Order::where('status', '!=', 'canceled')->orderBy('id', 'DESC')->limit(5)->get();
        return view('Admin.home.index')->with($data);
    }


}
