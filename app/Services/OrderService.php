<?php

namespace App\Services;

use Exception;
use App\Models\OrderProduct;
use App\Models\Product;

class OrderService extends BaseService
{

    public function storeOrder($order, $request)
    {
        $this->beginTransaction();
        try {
            $order->fill($request->only(['name', 'phone', 'email', 'delivery_option', 'delivery', 'without_call']));
            if (!$order->save()) {
                throw new Exception('Order was not saved');
            }
            $orderProductIds = [];
            foreach (session('cart')->items as $item) {
                OrderProduct::updateOrCreate(
                    [
                        'order_id' => $order->id,
                        'product_id' => $item['product']->id
                    ],
                    [
                        'price' => Product::find($item['product']->id)->price,
                        'currency' => $item['product']->currency,
                        'quantity' => $item['qty'],
                    ]
                );
                $orderProductIds[] = $item['product']->id;
            }
            OrderProduct::where('order_id', $order->id)->whereNotIn('product_id', $orderProductIds)->delete();
            $request->session()->put('order', $order);
        } catch (Exception $e) {
            return $this->rollback($e, 'Order create failed');
        }
        $this->commit();

        return true;
    }
}
