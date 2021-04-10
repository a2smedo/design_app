<?php

use App\User;
use Illuminate\Support\Facades\Config;

// Status Codes
function success()
{
    return 200;
}
function error()
{
    return 401;
}
function token_expired()
{
    return 403;
}
function not_active()
{
    return 405;
}

function verification_code()
{
    //$code = mt_rand(1000, 9999);
    $code = 1111;
    return $code;
}

function callback_data($status, $key, $data = [])
{
    $language = request()->header('lang');

    if (!empty($data)){
        if (is_array($data)){
            if (sizeof($data) > 0){
                return response()->json([
                    'status' => $status,
                    'msg' => isset($language) ? Config::get('response.'.$key.'.'.request()->header('lang')) : Config::get('response.'.$key),
                    'data' => $data,
                ]);
            }else{
                return response()->json([
                    'status' => $status,
                    'msg' => isset($language) ? Config::get('response.'.$key.'.'.request()->header('lang')) : Config::get('response.'.$key),
                ]);
            }
        }
        return response()->json([
            'status' => $status,
            'msg' => isset($language) ? Config::get('response.'.$key.'.'.request()->header('lang')) : Config::get('response.'.$key),
            'data' => $data,
        ]);
    }
    return response()->json([
        'status' => $status,
        'msg' => isset($language) ? Config::get('response.'.$key.'.'.request()->header('lang')) : Config::get('response.'.$key),
    ]);
}
