<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;

class UserController extends Controller
{
    public function index()
    {
        $userRule = Rule::where("name", "user")->first();
        $data['users'] = User::where("rule_id", $userRule->id)
                            ->orderBy('id', 'DESC')
                            ->paginate(6);

        return view('Admin.users.index')->with($data);

    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $orders = Order::where('user_id', $user->id)->get();


        return view('Admin.users.show',[
            'user' => $user,
            'orders' => $orders
        ]);
    }



   


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(url("/dashboard/users"));
    }


}
