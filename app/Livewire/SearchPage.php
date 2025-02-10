<?php

namespace App\Livewire;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Traits\CartTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
use Livewire\Component;

class SearchPage extends Component
{
    use CartTrait;
    use LivewireAlert;
    use WithPagination;
    protected $listeners = ['update' , 'render'];
    public $search;
    public $brandId = 0;

    public $categoryId = 0;

    public $minPrice = 0;
    public $maxPrice = 0;

    public $selectedPrice = 0;

    public $paginationNumber = 5;


    public function mount($search)
    {
        $this->search = $search;
    }

    public function filter()
    {
        $this->resetPage();
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

        $query = Product::where('name', 'like', '%' . $this->search . '%')->where('stock', '>', 0);

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

        if ($this->categoryId != 0) {
            $query->where('category_id', '=', $this->categoryId);
        }

        $products = $query->paginate(5);
        $brands = Brand::all();
        $categories = Category::all();


        if ($products) {
           return view('livewire.search-page', ['brands' => $brands , 'categories' => $categories , 'products' => $products]);
        }
        else {
            $message = 'No products found';
            return view('livewire.search-page', ['message' => $message , 'brands' => $brands]);
        }
    }
}
