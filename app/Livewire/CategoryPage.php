<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;

class CategoryPage extends Component
{
    protected $listeners = ['update' , 'render'];
    public $ctgName;
    public $brandId = 0; // Initialize brandId

    public function mount($ctgName)
    {
        $this->ctgName = $ctgName;
    }

    public function filterByBrand($brandId)
    {
        $this->brandId = $brandId;
        $this->dispatch('update'); // Correctly dispatch the update event
    }

    public function render()
    {
        $query = Product::whereHas('category', function($query) {
            $query->where('name', $this->ctgName);
        });

        if ($this->brandId != 0) {
            $query->where('brand_id', '=', $this->brandId);
        }

        $products = $query->get();
        $brands = Brand::all();

        return view('livewire.category-page', ['products' => $products, 'brands' => $brands]);
    }
}
