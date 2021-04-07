<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data['orders'] = Order::paginate(6);
        return view('Admin.orders.index')->with($data);
    }

    public function show(Order $order)
    {
        $data['order'] = $order;
        return view('Admin.orders.show')->with($data);
    }

    public function delete(Order $order)
    {
        $order->delete();
        return back();
    }


    public function accepted(Order $order)
    {
        $order->update([
            'status' => "accepted",
        ]);

        return redirect(url("/dashboard/orders/show/$order->id"));
    }

    public function completed(Order $order)
    {
        $order->update([
            'status' => "completed",
        ]);

        return redirect(url("/dashboard/orders/show/$order->id"));
    }

    public function canceled(Order $order)
    {
        $order->update([
            'status' => "canceled",
        ]);

        return redirect(url("/dashboard/orders/show/$order->id"));
    }
}
