<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductsTable extends Component
{
    protected $listeners = ['updateTable' => 'render'];

    public $start = 0;
    public $limits = 10;
    public $products;
    public $categories;
    public $page = 1;
    public $filter = 'all';

    public $searchContent = '';

    // public $path;
    

    public function loadMore()
    {
        if($this->start + $this->limits < Product::count()) {
            $this->start += 10;
            $this->page++;
            $this->render();  
        }
    }

    public function loadLess()
    {
        if($this->start > 0) {
            $this->start -= 10;
            $this->page--;
            $this->render();
        }
    }

    public function filterByCtg()
    {
        $this->start = 0;   
        $this->page = 1;  
        $this->dispatch('updateTable');         
     }

    public function search() {
        $this->start = 0;
        $this->page = 1;
        $this->dispatch('updateTable');
    }

    public function render()
    {
        $query = Product::with('images')->select(
            'product_id',
            'name',
            'price',
            'description',
            'stock',
            'category_id'
        )->skip($this->start)
         ->take($this->limits);

         if ($this->filter !== 'all') {
            $query->where('category_id', $this->filter);
        }

        if ($this->searchContent) {
            $query->where('name', 'like', '%' . $this->searchContent . '%');
        }

        $this->products = $query->get();

        $this->categories = Category::select('category_id', 'name')->get()->keyBy('category_id');


        foreach ($this->products as $product) {
            $product->category_name = $this->categories->get($product->category_id)->name ?? 'Unknown';
        }

        return view('livewire.admin.products-table' , [
            'products' => $this->products,
            'categories' => $this->categories
        ]);
    }
}
