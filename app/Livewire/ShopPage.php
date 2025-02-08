<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Product;
use App\Traits\CartTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class ShopPage extends Component
{
    use CartTrait;
    use LivewireAlert;
    protected $listeners = ['update' , 'render'];
    public $brandId = 0;

    public $products;

    public $minPrice = 0;
    public $maxPrice = 0;

    public $selectedPrice = 0;


    public function filterByBrand()
    {
        $this->dispatch('update'); 
    }

    public function filterByPrice()
    {
        $this->dispatch('update');
    }

    public function ToCart($product_id)
    {
        $added = $this->addToCart($product_id);
        
        if($added == false) {
            session()->flash('message', 'Product not found');
            return;
        }
        
        $this->dispatch('cartUpdated');
        $this->alert('success', 'Product added to cart');

    }  

    public function render()
    {

        $query = Product::where('stock', '>', 0);

        if ($this->maxPrice == 0) {
            $this->maxPrice = Product::max('price');
            $this->selectedPrice = $this->maxPrice;

        }

        if ($this->maxPrice != 0) {
            $query->where('price', '>=', $this->minPrice)->where('price', '<=', $this->selectedPrice);
        }

        if ($this->brandId != 0) {
            $query->where('brand_id', '=', $this->brandId);
        }

        $this->products = $query->get();
        $brands = Brand::all();

        if ($this->products) {
           return view('livewire.category-page', ['brands' => $brands]);
        }
        else {
            $message = 'No products found';
            return view('livewire.category-page', ['message' => $message , 'brands' => $brands]);
        }
    }
}
