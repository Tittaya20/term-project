<?php

namespace App\Http\Controllers;

use App\Models\SaleDetail;
use Illuminate\Http\Request;
use App\Models\Sale;

class CartController extends Controller
{
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');
        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        session()->flash('success', 'Item Cart is Updated Successfully !');
        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');
        return redirect()->route('cart.list');
    }

    public function clearAllCart()
    {
        \Cart::clear();
        session()->flash('success', 'All Item Cart Clear Successfully !');
        return redirect()->route('cart.list');
    }

    
    public function checkout(){
        $cartUser = auth()->user()->id;
        $cartItems = \Cart::getContent();
        $cartTotal = \Cart::getTotal();
        return view('checkout', compact('cartUser','cartItems','cartTotal'));
    }
    
    public function saveCart(){
        $cartUser = auth()->user()->id;
        $cartItems = \Cart::getContent();
        $cartTotal = \Cart::getTotal();
        $sale = Sale::create([
            'sale_user_id' => $cartUser,
            'sumtotal' => $cartTotal,
            'payment_status' => false,
        ]);
        $sale_id = $sale->id;
        foreach($cartItems as $item){
            $sale_detail = SaleDetail::create([
                'sale_id' => $sale_id,
                'pro_id' => $item->id,
                'price' => $item->price,
                'amount' => $item->quantity,
                'total_price' => $item->price * $item->quantity,
            ]);
        };
        \Cart::clear();
        return redirect()->route('products.list');
    }
}