<?php

namespace App\Http\Controllers\Web\Admin;

use App\Models\Rule;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(url("/dashboard/users"));
    }


}
