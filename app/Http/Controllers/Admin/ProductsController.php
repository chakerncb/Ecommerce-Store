<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
class ProductsController extends Controller
{

    use ImageTrait;
    
    //
    function __construct() {
        $this->middleware('auth:admin');
    }

    public function index() {

        $products = Product::select(
            'product_id',
            'name',
            'price',
            'description',
            'stock',
            'category_id',
            'image'
    ) -> get();

    $categories = Category::select('category_id', 'name')->get()->keyBy('category_id');

    foreach ($products as $product) {
        $product->category_name = $categories->get($product->category_id)->name ?? 'Unknown';
    }

    return view('admin.product.products-list', compact('products'));
    }
    public function create() {

        $categories = Category::select('category_id', 'name') -> get();

        return view('admin.product.add-product' , compact('categories'));
    }

    public function store(Request $request) {
   
        $filename = $this -> saveImage($request -> image , 'assets/src/images/product');

       $product = Product::create([
            'name' => $request -> name,
            'price' => $request -> price,
            'description' => $request -> description,
            'stock' => $request -> stock,
            'category_id' => $request -> category_id,
            'image' => $filename,

           
        ]);

        // return redirect() -> back() -> with(['success' => 'Product created successfully']);)

        if(!$product) {
            return response() -> json(
                [
                    'status' => false,
                    'message' => 'Product not created'
                ]
            );
        }
         else{

        return response() -> json(
            [
                'status' => true,
                'message' => 'Product created successfully'
            ]
        );
    }
    }


    public function edit($product_id) {
        $product = Product::where('product_id', $product_id)->first();
        $categories = Category::select('category_id', 'name') -> get();

        if(!$product) {
            return response() -> json(
                [
                    'status' => false,
                    'message' => 'Product not found'
                ]
            );
        }
        return view('admin.product.edit-product', compact('product', 'categories'));
    }

public function update($product_id, ProductRequest $request) {
      $product = Product::where('product_id', $product_id)->first();

      if(!$product) {
          return redirect() ->back() -> with(['error' => 'Product not found']);
      }

      $filename = $product -> image;

      if($request -> hasFile('image')) {
            $filename = $this -> saveImage($request -> image , 'assets/src/images/product');
      }

      $product -> update([
            'name' => $request -> name,
            'price' => $request -> price,
            'description' => $request -> description,
            'stock' => $request -> stock,
            'category_id' => $request -> category_id,
            'image' => $filename,
      ]);

      return redirect() -> back() -> with(['success' => 'Product updated successfully']);
} 

public function delete(Request $request) {
    $product_id = $request -> product_id;
    $product = Product::where('product_id', $product_id)->first();

    if(!$product) {
        return response() -> json(
            [
                'status' => false,
                'message' => 'Product not found'
            ]
        );
    } else {
        $product -> delete();
        return response() -> json(
            [
                'status' => true,
                'message' => 'Product deleted successfully',
                'product_id' => $product_id
            ]
        );
    }       
}


}
