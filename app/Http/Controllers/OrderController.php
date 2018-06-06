<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class OrderController extends Controller
{
    /**
     * create order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function createOrder()
    {
        if (session('cart') and session('cart')->items) {
            $order = session('order') ?? new Order();

            return view('front-side.cart.order', compact('order'));
        }

        return redirect()->route('index');
    }

    /**
     * store order when click next
     * @param OrderService $service
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function storeOrder(Request $request, OrderService $service)
    {
        $request->validate([
            'name' => 'required|max:250|min:3',
            'email' => 'required|email',
            'phone' => 'required|min:5|max:50',
            'delivery_option' => 'in:1,2',
            'delivery' => 'required'
        ]);
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

    /**
     * show order info from session
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function showOrder()
    {
        if (session('order')) {
            return view('front-side.cart.order', ['order' => session('order')]);
        }

        return redirect()->route('checkout');
    }

    /**
     * confirm order. clear session. send message. show success
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirmOrder(Order $order)
    {
        $order = $order->findOrFail(session('order')['id']);
        $order->is_confirm = 1;
        $order->save();

        $this->sendMessages($order);

        session()->forget('cart');
        session()->forget('order');

        return view('front-side.cart.successful', ['id' => $order->id]);
    }

    /**
     * send messages
     * @param $order
     */
    private function sendMessages($order)
    {
        $arr = [
            "Заказ номер" => $order->id,
            "Имя" => $order->name,
            "Телефон" => $order->phone,
            "Email" => $order->email,
            "Товары" => ''
        ];
        $txt = '';
        foreach ($arr as $key => $value) {
            $txt .= urlencode("<b>".$key."</b>: ".$value) . "%0A";
        }
        foreach ($order->products as $product) {
            $txt .= urlencode('  ' . $product->getProduct->ru_title . ' - ' .
                $product->quantity . 'x' . $product->price . ' ' . $product->currency) ."%0A";
        }
        $txt .= '%0A';
        $txt .= $order->without_call ? "urlencode(<b>Без звонка</b>)" . "%0A": '';
        $txt .= $order->delivery_option == 1 ? urlencode("<b>Курьером по Киеву</b>"): urlencode("<b>Новой почтой</b>");
        $txt .= '%0A';
        $txt .= urlencode("<b>Язык общения</b>: ") . app()->getLocale();

        $token = env('TG_BOT');
        $chat_id = env('TG_CHAT');
        fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
        mail('inbox@aeroshop.com.ua', 'заказ', $txt);
    }
}
