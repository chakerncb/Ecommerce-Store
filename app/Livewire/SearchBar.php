<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class SearchBar extends Component
{

    protected $listeners = ['update' => 'render'];
    public $searchContent = '';

    public $products = [];


    public function searchGo()
    {
        return redirect()->route('search', ['search' => $this->searchContent]);
    }

    public function search()
    {
        if ($this->searchContent) {
            $query = Product::with('images')->select(
                'product_id',
                'name',
                'price',
                'description',
                'stock',
                'category_id'
            );

            $query->where('name', 'like', '%' . $this->searchContent . '%');

            $productsResult = $query->take(4)->get();

            $categoriesResult = Category::select('category_id', 'name')->get()->keyBy('category_id');

            foreach ($productsResult as $product) {
                $product->category_name = $categoriesResult->get($product->category_id)->name ?? 'Unknown';
            }

            $this->products = $productsResult;
        } else {
            $this->products = [];
        }

        $this->dispatch('update');
    }

    public function render()
    {
        return view('livewire.search-bar');
    }


}
