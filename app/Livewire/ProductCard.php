<?php

namespace App\Livewire;

use App\Mail\PaidInvoice;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Mail;
use Symfony\Component\Mailer\DelayedEnvelope;

class ProductCard extends Component
{

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

    public function addToCart($product_id)
    {
        $product = Product::find($product_id);
        $image = $product->images->first();
        Cart::add(
            $product->product_id,
            $product->name,
            $this->quantity[$product_id],
            $product->price,
            ['path' => $image->path ?? 'no-image.png'],
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
