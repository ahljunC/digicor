<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Store a new order.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'shipping_fullname' => 'required',
            'shipping_state' => 'required',
            'shipping_city' => 'required',
            'shipping_address' => 'required',
            'shipping_phone' => 'required',
            'shipping_zipcode' => 'required',
        ]);
        
        $order = new Order();
        
        $order->order_number = uniqid('OrderNumber-');
        $order->user_id = auth()->id();

        $order->shipping_fullname = $request->input('shipping_fullname');
        $order->shipping_address = $request->input('shipping_address');
        $order->shipping_city = $request->input('shipping_city');
        $order->shipping_state = $request->input('shipping_state');
        $order->shipping_zipecode = $request->input('shipping_zipcode');
        $order->shipping_phone = $request->input('shipping_phone');

        $order->item_count = \Cart::session(auth()->id())->getContent()->count();
        $order->total = \Cart::session(auth()->id())->getTotal();
        
        $order->status = 'pending';
        
        $order->save();

        $cartProducts = \cart::session(auth()->id())->getContent();
        
        foreach ($cartProducts as $product) {
            $order->products()->attach($product->id, ['price' => $product->price, 'quantity' => $product->quantity]);
        }
        
        \Cart::clear();

        return redirect()->route('home');
    }
}
