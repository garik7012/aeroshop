<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class OrderController extends Controller
{
    public function createOrder()
    {
        if (session('cart') and session('cart')->items) {
            $order = session('order') ?? new Order();

            return view('front-side.cart.order', compact('order'));
        }

        return redirect()->route('index');
    }

    public function storeOrder(OrderRequest $request, OrderService $service)
    {
        $order = Order::find(session('order')['id']) ?? new Order();

        if ($service->storeOrder($order, $request)) {
            $total = [];
            foreach (Cart::CURRENCIES as $currency) {
                $total[$currency] = 0;
            }
            return view('front-side.cart.order-confirm', compact('order', 'total'));
        } else {
            return back()->with('danger', 'order create failed');
        }
    }

    public function showOrder()
    {
        if (session('order')) {
            return view('front-side.cart.order', ['order' => session('order')]);
        }

        return redirect()->route('checkout');
    }

    public function confirmOrder(Order $order)
    {
        $order = $order->findOrFail(session('order')['id']);
        $order->is_confirm = true;
        $order->save();

        session()->forget('cart');
        session()->forget('order');

        return view('front-side.cart.successful', ['id' => $order->id]);
    }
}
