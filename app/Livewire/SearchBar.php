<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class SearchBar extends Component
{

    protected $listeners = ['update' => 'render'];
    public $searchContent = '';

    public $categories = [];

    public $products = [];

    public function search(){

        if ($this->searchContent){
         $query = Product::with('images')->select(
            'product_id',
            'name',
            'price',
            'description',
            'stock',
            'category_id'
        );

        if ($this->searchContent) {
            $query->where('name', 'like', '%' . $this->searchContent . '%');
        }

        $this->products = $query->get();

        $this->categories = Category::select('category_id', 'name')->get()->keyBy('category_id');


        foreach ($this->products as $product) {
            $product->category_name = $this->categories->get($product->category_id)->name ?? 'Unknown';
        }
    }
    else {
        $this->products = [];
    }

        $this->dispatch('update');
    }
    public function render()
    {
        return view('livewire.search-bar');
    }


}
