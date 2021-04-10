<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;



class ForgotPasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);

        if ($validator->fails()) {
            $erorrs =  $validator->errors()->toArray();

            if (isset($erorrs['email'])) {
                return callback_data(401, 'email_required');
            }
        }

        $email = $request->email;
        if (User::where('email', $email)->doesntExist()) {
            return callback_data(401, 'user_not_found');
        }

        $code = Str::random(10);
        try {
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $code
            ]);
          Mail::to($email)->send(new ForgotPassword(['code' => $code]));
            return callback_data(200, 'check_email');

        } catch (\Exception $e) {
            return callback_data(401, '', $e->getMessage());
        }
    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'password' => 'required|confirmed'
        ]);

        $code = $request->code;
        if (!$passwordResets = DB::table('password_resets')->where('token', $code)->first()) {
            return callback_data(401, 'invalid_code');
        }

        if (!$user = User::where('email', $passwordResets->email)->first()) {
            return callback_data(401, 'user_not_found');
        }
        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_resets')->where('email', $user->email)->delete();
        return callback_data(200, 'password_changes');
    }
}
