<?php

namespace App\Http\Controllers\Api\Collections;

use App\Models\Order;
use App\Models\Design;
use App\Mail\ActivationMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    public function ready(Request $request, Design $design)
    {
        $request->validate([
            'design_name' => 'required',
            'lang' => 'required',
            'details' => 'required',
        ]);

        $user = $request->user();
        Order::create([
            'user_id' => $user->id,
            'design_id' => $design->id,
            'design_name' => $request->design_name,
            'lang' => $request->lang,
            'background' => $design->background,
            'color' => $design->color,
            'font' => $design->font,
            'imgs' => $design->imgs,
            'details' => $request->details,
        ]);

        $code = verification_code();

//        Mail::to($user->email)->send(new ActivationMail(['code' => $code]));
        return callback_data(200, 'order_created');
    }


    public function uponRequest(Request $request, Design $design)
    {
        $request->validate([
            'design_name' => 'required',
            'lang' => 'required',
            'background' => 'required',
            'color' => 'required',
            'font' => 'required',
            'imgs' => 'required',
            'details' => 'required',
        ]);

        $user = $request->user();
        Order::create([
            'user_id' => $user->id,
            'design_id' => $design->id,
            'design_type' => 'upon_request',
            'design_name' => $request->design_name,
            'lang' => $request->lang,
            'background' => $request->background,
            'color' => $request->color,
            'font' => $request->font,
            'imgs' => $request->imgs,
            'details' => $request->details,
        ]);
        $code = verification_code();
//        Mail::to($user->email)->send(new ActivationMail(['code' => $code]));
        return callback_data(200, 'order_created');
    }


    public function showMyOrder(Request $request)
    {
        $user = $request->user();
        $orders =   OrderResource::collection(Order::where('user_id', $user->id)
        ->orderBy('id', 'DESC')->get());

        if ($orders->isEmpty()) {
            return callback_data(401, 'no_orders');
        }

        return callback_data(200, 'orders', $orders);
    }
}
