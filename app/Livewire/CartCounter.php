<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartCounter extends Component
{
    protected $listeners = ['cartUpdated' => 'render'];
    public function render()
    {
        $cartCount = Cart::content()->count();

        return view('livewire.cart-counter' , compact('cartCount'));
    }
}
