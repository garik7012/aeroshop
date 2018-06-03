<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index(Order $order)
    {
        return view('admin.order.all', ['orders' => $order->all()]);
    }
}
