<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index($name) {

        $product = Product::where('name' , $name)->first();

        $categories = Category::select('category_id', 'name')->get()->keyBy('category_id');

    
       $category =  $product->category_name = $categories->get($product->category_id)->name ?? 'Unknown';
    

        if(!$product) {
            return redirect()->route('index');
        }

        return view('front.product-details' , compact('product' , 'category'));
    }
}
