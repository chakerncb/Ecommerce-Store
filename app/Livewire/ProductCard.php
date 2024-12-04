<?php

namespace App\Livewire;

use App\Mail\PaidInvoice;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Mail;
use Symfony\Component\Mailer\DelayedEnvelope;

class ProductCard extends Component
{

    public $products;
    public array $quantity = [];

    public function mount()
    {
        $this->products = Product::all();
        foreach ($this->products as $product) {
            $this->quantity[$product->product_id] = 1;
        }
    }

    public function render()
    {
        return view('livewire.product-card');	
    }

    public function addToCart($product_id)
    {
        $product = Product::find($product_id);
        $image = $product->images->first();
        Cart::add(
            $product->product_id,
            $product->name,
            $this->quantity[$product_id],
            $product->price,
            ['path' => $image->path],
            0,
        );
        $this->dispatch('cartUpdated');
        session()->flash('message', 'Product added to cart');
        // $this->deleteMsg();

    }  
    
    public function deleteMsg() {
        sleep(2);
        session()->forget('message');
    }

    



}
