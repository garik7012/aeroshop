<?php

namespace App\Models;

class Cart
{
    const CURRENCIES = ["UAH", "USD", "GBP", "EUR", "JPY"];
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = [];

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        } else {
            foreach (self::CURRENCIES as $currency) {
                $this->totalPrice[$currency] = 0;
            }
        }
    }

    public function add($item, $id, $quantity = 1)
    {
        $storedItem = ['qty' => 0, 'product' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty'] += $quantity;
        $this->items[$id] = $storedItem;
        $this->totalQty += $quantity;

        $this->totalPrice[$item->currency] += $item->price * $quantity;
    }

    public function deleteProduct($product)
    {
        $id = $product->id;
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $this->totalPrice[$product->currency] -= $product->price * $this->items[$id]['qty'];
                $this->totalQty -= $this->items[$id]['qty'];
                unset($this->items[$id]);
            }
        }
    }
}
