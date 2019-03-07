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

    public function showOrder($id)
    {
        return view('admin.orders.single_order', [
            'orders' => Order::find($id),
        ]);
    }
}
