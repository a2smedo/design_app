<?php

namespace App\Http\Controllers\Api\Auth;

use Carbon\Carbon;
use App\Models\Rule;
use App\Models\User;
use App\Mail\ActivationMail;
use App\Models\Notification;
use App\Models\Verification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    // User Register
    public function register(Request $request)
    {
        $rule_user = Rule::where('name', 'user')->first();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required',
            'phone' => 'required',
            'type' => 'required'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();

            if (isset($errors['name'][0])) {
                return callback_data(401, 'name_required', []);
            }
            if (isset($errors['email'][0])) {
                $emails = User::pluck('email')->toArray();
                if (in_array($request->email, $emails)) {
                    return callback_data(401, 'email_exist');
                }
                return callback_data(401, 'email_required', []);
            }

            if (isset($errors['password'][0])) {
                return callback_data(401, 'password_required', []);
            }

            if (isset($errors['password_confirmation'][0])) {
                return callback_data(401, 'password_confirmation_required', []);
            }

            if (isset($errors['phone'][0])) {
                return callback_data(401, 'phone_required', []);
            }

            if (isset($errors['type'][0])) {
                return callback_data(401, 'type_required', []);
            }
        }

        $phones = User::pluck('phone')->toArray();
        if (in_array($request->phone, $phones)) {
            return callback_data(401, 'phone_exist');
        }

        $user = User::create([
            'rule_id' => $rule_user->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'type' => $request->type
        ]);

        // verification
        if ($user) {
            $code = verification_code();

            Verification::create([
                'email' => $request->email,
                'code' => $code,
                'expired_at' => Carbon::now()->addHour()
            ]);

            Notification::create([
                'title' => $user->name,
                'message' => 'new user register',
                'type' => 'user',

            ]);

            Mail::to($user->email)->send(new ActivationMail(['code' => $code]));
            return callback_data(200, 'registered', $user);
        } else {
            return callback_data(401, 'user_not_found');
        }
    }

    // User Login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            if (isset($errors['email'][0])) {
                return callback_data(401, 'email_not_found', []);
            }
            if (isset($errors['password'][0])) {
                return callback_data(401, 'password_required', []);
            }
        }


        // Password correct
        if (!Hash::check($request->password, $user->password)) {
            return callback_data(401, 'password_not_correct');
        }

        if ($user) {
            if ($user->status != 1) {
                Verification::create([
                    'email' => $request->email,
                    'code' => verification_code(),
                    'expired_at' => Carbon::now()->addHour()
                ]);
                $code = verification_code();
                Mail::to($user->email)->send(new ActivationMail(['code' => $code]));
                return callback_data(402, 'user_not_activated');
            }

            $token = $user->createToken('token')->accessToken;
            $user->token = $token;
            return callback_data(200, 'logged_in', $user);
        }
    }

    // Send code to email
    public function sendCode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            if (isset($errors['email'])) {

                return callback_data(401, 'email_required', []);
            }
        }


        $emails = User::pluck('email')->toArray();

        if (!in_array($request->email, $emails)) {
            return callback_data(401, 'email_not_found');
        }

        $user = User::where('email', $request->email)->first();
        $code = verification_code();

        if ($user->status == 1) {
            return callback_data(200, 'email_already_activate');
        } else {

            $emails_check = Verification::pluck('email')->toArray();

            if (!in_array($request->email, $emails_check)) {
                Verification::create([
                    'email' => $request->email,
                    'code' => $code,
                    'expired_at' => Carbon::now()->addHour()
                ]);
            } else {

                if ($request->email == $emails_check[0]) {

                    $verification = Verification::where('email', $request->email)->first();

                    $verification->update([
                        'code' => $code,
                        'expired_at' => Carbon::now()->addHour()
                    ]);
                }
            }
        }

        Mail::to($user->email)->send(new ActivationMail(['code' => $code]));
        return callback_data(200, 'code_sent');
    }



    // Verify email
    public function verify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            if (isset($errors['code'][0])) {
                return callback_data(401, 'code_required', []);
            }
        }

        $codes = Verification::pluck('code')->toArray();
        if (!in_array($request->code, $codes)) {
            return callback_data(401, 'code_not_found');
        }

        $verified = Verification::where('code', $request->code)->first();

        if ($verified->used == 1) {
            return callback_data(401, 'code_used');
        }
        if ($verified->expired_date > Carbon::now()) {
            return callback_data(401, 'time_exceeded');
        } else {
            $user = User::where('email', $verified->email)->first();

            if ($user) {
                $user->status = 1;
                $user->save();
                $verified->delete();

                $token = $user->createToken('token')->accessToken;
                $user->token = $token;
                return callback_data(200, 'activated', $user);
            } else {
                return callback_data(401, 'user_not_found');
            }
        }
    }


    public function updateProfil(Request $request)
    {
        $user = $request->user();

        //name
        if ($request->name == '') {
            return callback_data(401, 'name_required');
        } elseif (is_numeric($request->name)) {
            return callback_data(401, 'name_string');
        }

        //email
        $emails = User::where('id', '!=', $user->id)->pluck('email')->toArray();
        if ($request->email == '') {
            return callback_data(401, 'email_required');
        } elseif (in_array($request->email, $emails)) {
            return callback_data(401, 'email_exist');
        }

        //phone
        $phones = User::where('id', '!=', $user->id)->pluck('phone')->toArray();
        if ($request->phone == '') {
            return callback_data(401, 'phone_required');
        } elseif (in_array($request->phone, $phones)) {
            return callback_data(401, 'phone_exist');
        }

        User::where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return callback_data(200, 'update_success');
    }



    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
    }
}
