<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function showOrders()
    {
        return view('admin.orders.order_list', [
            'orders' => Order::all(),
        ]);
    }

    public function showOrder(Order $order)
    {
        if($order->status === 'pending') {
            $order->changeStatus('viewed');
        }
        return view('admin.orders.single_order', [
            'orders' => $order,
        ]);
    }

    public function changeStatus(Order $order, Request $request)
    {
        $order->changeStatus($request->get('status'));

        return response()->json([
            'status updated'
        ]);
    }
}
