<?php

namespace App\Livewire;

use App\Mail\PaidInvoice;
use App\Models\Category;
use App\Models\Product;
use App\Traits\CartTrait;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Mail;
use Symfony\Component\Mailer\DelayedEnvelope;

class ProductCard extends Component
{
    use CartTrait;

    public $products;
    public array $quantity = [];


    public function render()
    {

        $this->products = Product::where('stock', '>', 0)
                    ->latest()
                    ->take(12)
                    ->get();

        foreach ($this->products as $product) {
                    $this->quantity[$product->product_id] = 1;
                }

        $categories = Category::select('category_id', 'name')->get()->keyBy('category_id');

        foreach ($this->products as $product) {
            $product->category_name = $categories->get($product->category_id)->name ?? 'Unknown';
        }

        return view('livewire.product-card');	
    }

    // public function mount()
    // {
    //     foreach ($this->products as $product) {
    //         $this->quantity[$product->product_id] = 1;
    //     }

    //     $categories = Category::select('category_id', 'name')->get()->keyBy('category_id');

    //     foreach ($this->products as $product) {
    //         $product->category_name = $categories->get($product->category_id)->name ?? 'Unknown';
    //     }
    // }

    public function ToCart($product_id)
    {
        $added = $this->addToCart($product_id);
        
        if($added == false) {
            session()->flash('message', 'Product not found');
            return;
        }
        else {
            $this->dispatch('cartUpdated');
            session()->flash('message', 'Product added to cart');
        }
        // $this->deleteMsg();

    }  
    
    public function deleteMsg() {
        sleep(2);
        session()->forget('message');
    }

    



}
