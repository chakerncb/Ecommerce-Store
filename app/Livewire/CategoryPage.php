<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Product;
use App\Traits\CartTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CategoryPage extends Component
{
    use CartTrait;
    use LivewireAlert;
    protected $listeners = ['update' , 'render'];
    public $ctgName;
    public $brandId = 0;

    public $products;

    public $minPrice = 0;
    public $maxPrice = 0;

    public $selectedPrice = 0;


    public function mount($ctgName)
    {
        $this->ctgName = $ctgName;
    }

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
        else {
            $this->dispatch('cartUpdated');
            session()->flash('message', 'Product added to cart');
        }
        // $this->deleteMsg();

        $this->alert('success', 'Product added to cart');

    }  

    public function render()
    {

        $query = Product::whereHas('category', function($query) {
            $query->where('name', $this->ctgName)->where('stock', '>', 0);
        });

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
