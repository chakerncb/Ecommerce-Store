<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            'image'
    ) -> get();

        return view('admin.product.products-list', compact('products'));
    }

    public function create() {
        return view('admin.product.add-product');
    }

    public function store(Request $request) {

        return $request -> all();
   
    //     $filename = $this -> saveImage($request -> image , 'src/images/product');

    //    $product = Product::create([
    //         'name' => $request -> name,
    //         'price' => $request -> price,
    //         'description' => $request -> description,
    //         'stock' => $request -> stock,
    //         'image' => $filename,

           
    //     ]);

    //     // return redirect() -> back() -> with(['success' => 'Product created successfully']);)

    //     if(!$product) {
    //         return response() -> json(
    //             [
    //                 'status' => false,
    //                 'message' => 'Product not created'
    //             ]
    //         );
    //     }
    //      else{

    //     return response() -> json(
    //         [
    //             'status' => true,
    //             'message' => 'Product created successfully'
    //         ]
    //     );
    // }
    }


}
