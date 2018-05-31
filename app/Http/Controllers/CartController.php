<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Session;
use App\Models\Cart;

class CartController extends Controller
{
    public function showCart()
    {
        return view('front-side.cart.cart');
    }

    public function addOneToCart($id, Request $request, Product $product)
    {
        $product = $product->findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    public function addToCart($id, Request $request, Product $product)
    {
        $request->validate([
           'quantity' => 'required|numeric|min:1|max:9999'
        ]);

        $product = $product->findOrFail($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $request->quantity);

        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    public function deleteItemFromCart($id, Request $request, Product $product)
    {
        $product = $product->findOrFail($id);
        $oldCart = session('cart');

        $cart = new Cart($oldCart);
        $cart->deleteProduct($product);

        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    public function updateCart(Request $request, Product $product)
    {
        $cart = new Cart(null);
        foreach ($request->cart_quantity as $id => $quantity) {
            if (isset($request->cart_delete[$id])) {
                continue;
            }
            $product = $product->findOrFail($id);
            $cart->add($product, $product->id, $quantity);
        }
        $request->session()->put('cart', $cart);

        return redirect()->back();
    }
}
