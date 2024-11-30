<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    public function render()
    {
        $cartCount = Cart::content()->count();

        return view('livewire.cart-counter' , compact('cartCount'));
    }
}
