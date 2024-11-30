<?php

namespace App\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartPreview extends Component
{

    protected $listeners = ['cartUpdated' => 'render'];
    public function render()
    {
        $cartItems = Cart::content();
        $cartTotal = Cart::total();
        $cartCount = Cart::content()->count();

        return view('livewire.cart-preview', compact('cartItems' , 'cartTotal' , 'cartCount'));
    }
    

    public function removefromCart($product_id)
    {
        $row = Cart::search(function ($cartItem, $rowId) use ($product_id) {
            return $cartItem->id === $product_id;
        })->first();
        Cart::remove($row->rowId);
        $this->dispatch('cartUpdated');        
    }
}
