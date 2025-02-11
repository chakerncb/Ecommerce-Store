<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsTable extends Component
{
    use WithPagination;
    protected $listeners = ['updateTable' => 'render'];

    public $start = 0;
    public $limits = 10;
    // public $products;
    // public $categories;
    public $page = 1;
    public $filter = 'all';

    public $searchContent = '';


    public function filterByCtg()
    {
        $this->resetPage();
        $this->dispatch('updateTable');         
     }

    public function search() {
        $this->resetPage();
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
        );


         if ($this->filter !== 'all') {
            $query->where('category_id', $this->filter);
        }

        if ($this->searchContent) {
            $query->where('name', 'like', '%' . $this->searchContent . '%');
        }

        $products = $query->paginate(10);

        $categories = Category::select('category_id', 'name')->get()->keyBy('category_id');


        foreach ($products as $product) {
            $product->category_name = $categories->get($product->category_id)->name ?? 'Unknown';
        }

        return view('livewire.admin.products-table' , compact('products', 'categories'));
    }
}
