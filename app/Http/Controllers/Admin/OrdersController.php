<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index(Order $order)
    {
        return view('admin.order.all', ['orders' => $order->all()]);
    }

    public function showOrder($id, Order $orders)
    {
        $order = $orders->findOrFail($id);
        $total = [];
        foreach (Cart::CURRENCIES as $currency) {
            $total[$currency] = 0;
        }

        return view('admin.order.show', compact('order', 'total'));
    }

    public function updateOrder($id, Order $orders)
    {
        $order = $orders->findOrFail($id);
        $order->is_complete = 1;
        $order->save();

        return back()->with('success', 'Успешно обновлено');
    }
}
