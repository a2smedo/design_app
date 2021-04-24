<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $userRule = Rule::where('name', 'user')->first();
        $data['admins'] = User::where("rule_id", '!=', $userRule->id)
            ->orderBy('id', 'Desc')
            ->paginate(10);


        return view('Admin.admins.index')->with($data);
    }


    public function create()
    {
        $data['rules'] = Rule::select("id", "name")
            ->whereIn("name", ["super_admin", "admin"])
            ->get();
        return view('Admin.admins.create')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:5|max:255|confirmed',
            'rule_id' => 'required|exists:rules,id',

        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'rule_id' => $request->rule_id,
            'status' => 1
        ]);

        return redirect(url("/dashboard/admins"));
    }




    public function delete($id)
    {
        $admin = User::findOrfail($id);
        $admin->delete();
        return redirect(url("/dashboard/admins"));
    }


    public function promot($id)
    {
        $admin = User::findOrfail($id);
        $admin->update([
            'rule_id' => Rule::select("id")->where("name", "super_admin")->first()->id,
        ]);

        return back();
    }

    public function demot($id)
    {
        $superAdmin = User::findOrfail($id);
        $superAdmin->update([
            'rule_id' => Rule::select("id")->where("name", "admin")->first()->id,
        ]);

        return back();
    }
}
