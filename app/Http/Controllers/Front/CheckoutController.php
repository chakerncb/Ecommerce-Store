<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $cartItems = Cart::content();
        
        $Cart = new \stdClass();
        $Cart->total = Cart::total();
        $Cart->count = Cart::count();
        $Cart->subtotal = Cart::subtotal();
        $Cart->tax = Cart::tax();
        $Cart->discount = 0;


        if ($cartItems->count() == 0) {
            return redirect()->back()->with('error', 'Your cart is empty');
        }
    

        return view('front.checkout', compact('Cart','cartItems'));
    }

    public function store(OrderRequest $request){

        // if(!auth()->check()){
        //     return redirect()->route('login');
        // }

        // $order = Order::create([
        //     'user_id' => auth()->user()->id,
        //     'total' => Cart::total(),
        //     'status' => 'pending',
        //     'payment_method' => $request->payment_method,
        //     'shipping_fullname' => $request->shipping_fullname,
        //     'shipping_address' => $request->shipping_address,
        //     'shipping_city' => $request->shipping_city,
        //     'shipping_phone' => $request->shipping_phone,
        //     'notes' => $request->notes,
        // ]);

        return response()->json([
            'status' => true,
            'message' => $request->all(),
        ]);

    }
}
