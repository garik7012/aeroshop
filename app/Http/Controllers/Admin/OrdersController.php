<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * show order list
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Order $order)
    {
        return view('admin.order.all', ['orders' => $order->all()]);
    }

    /**
     * order details
     * @param $id
     * @param Order $orders
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showOrder($id, Order $orders)
    {
        $order = $orders->findOrFail($id);
        $total = [];
        foreach (Cart::CURRENCIES as $currency) {
            $total[$currency] = 0;
        }

        return view('admin.order.show', compact('order', 'total'));
    }

    /**
     * set is complete
     * @param $id
     * @param Order $orders
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateOrder($id, Order $orders)
    {
        $order = $orders->findOrFail($id);
        $order->is_complete = 1;
        $order->save();

        return back()->with('success', 'Успешно обновлено');
    }

    /**
     * delete order
     * @param $id
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteOrder($id, Order $order)
    {
        $order = $order->findOrFail($id);
        $order->delete();

        return back()->with('success', 'Заказ успешно удален');
    }
}
