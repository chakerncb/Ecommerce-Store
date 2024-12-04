<?php

namespace App\Livewire;


use Auth;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPage extends Component
{

    protected $listeners = ['cartUpdated' => 'render' ];
    public function render()
    {
        $cartItems = Cart::content();
        $cartTotal = Cart::total();
        $cartCount = Cart::content()->count();

        return view('livewire.cart-page' , compact('cartItems' , 'cartTotal' , 'cartCount'));	
    }

    public function removefromCart($product_id)
    {
        $row = Cart::search(function ($cartItem, $rowId) use ($product_id) {
            return $cartItem->id === $product_id;
        })->first();
        Cart::remove($row->rowId);
        $this->dispatch('cartUpdated');        
    }

    public function clearCart()
    {
        Cart::destroy();
        $this->dispatch('cartUpdated');
    }

    // public function goToCheckout(){
    //     if(Auth::user()->check()){
    //         return redirect()->route('checkout');
    //     }
    // }


    public function increment($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId, $item->qty + 1);
        $this->dispatch('cartUpdated');
    }

    public function decrement($rowId)
    {
        $item = Cart::get($rowId);
        Cart::update($rowId, $item->qty - 1);
        $this->dispatch('cartUpdated');
    }
}
