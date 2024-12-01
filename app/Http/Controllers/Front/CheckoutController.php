<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
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
}
