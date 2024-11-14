<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductFeatures;
use App\Models\ProductImage;
use App\Traits\ImageTrait;
// use Faker\Provider\Image;
use Illuminate\Http\Request;
use App\Models\Product;
use Image;
use App\Http\Requests\ProductRequest;

class ProductsController extends Controller
{

    use ImageTrait;

    //
    function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $products = Product::with('images')->select(
            'product_id',
            'name',
            'price',
            'description',
            'stock',
            'category_id'
        )->get();

        $categories = Category::select('category_id', 'name')->get()->keyBy('category_id');


        foreach ($products as $product) {
            $product->category_name = $categories->get($product->category_id)->name ?? 'Unknown';
        }

        return view('admin.product.products-list', compact('products'));
    }


    public function create()
    {

        $categories = Category::select('category_id', 'name')->get();

        return view('admin.product.add-product', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|integer|exists:categories,category_id',
            'feature_names' => 'array',
            'feature_names.*' => 'string|max:255',
            'feature_descrs' => 'array',
            'feature_descrs.*' => 'string|max:255',
        ]);

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description ?? '',
            'stock' => $request->stock,
            'category_id' => $request->category_id
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->images as $imagefile) {
                $filename = $this->saveImage($imagefile, 'assets/src/images/product/');
                ProductImage::create([
                    'product_id' => $product->product_id,
                    'path' => $filename
                ]);
            }
        }
        else {
            ProductImage::create([
                'product_id' => $product->product_id,
                'path' => 'no-image.png'
            ]);
        }

        if ($request->has('feature_names') && $request->has('feature_descrs')) {
            foreach ($request->feature_names as $index => $name) {
                ProductFeatures::create([
                    'product_id' => $product->product_id,
                    'name' => $name,
                    'description' => $request->feature_descrs[$index]
                ]);
            }
           
        }

        return response()->json([
            'status' => true,
            'message' => 'Product created successfully'
        ]);
    }


    public function edit($product_id){
        $product = Product::where('product_id', $product_id)->first();
        $categories = Category::select('category_id', 'name')->get();

        if (!$product) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Product not found'
                ]
            );
        }
        return view('admin.product.edit-product', compact('product', 'categories'));
    }


    public function update($product_id, ProductRequest $request)
    {

        $product = Product::where('product_id', $product_id)->first();

        if (!$product) {
            return redirect()->back()->with(['error' => 'Product not found']);
        }

        // Handle removed features
        if ($request->has('removed_features')) {
            $removedFeatures = array_filter(explode(',', rtrim($request->removed_features, ',')));
            if (!empty($removedFeatures)) {
                ProductFeatures::whereIn('feature_id', $removedFeatures)->delete();
            }
        }

        if ($request->hasFile('images')) {
            foreach ($request->images as $imagefile) {
                $filename = $this->saveImage($imagefile, 'assets/src/images/product/');
                $productImage = ProductImage::where('product_id', $product->product_id)->first();
                if ($productImage) {
                    $productImage->update(['path' => $filename]);
                } else {
                    ProductImage::create([
                        'product_id' => $product->product_id,
                        'path' => $filename
                    ]);
                }
            }
        }

        if ($request->has('feature_names') && $request->has('feature_descrs')) {
            foreach ($request->feature_names as $index => $name) {
                $feature = ProductFeatures::where('product_id', $product->product_id)->where('name', $name)->first();
                if ($feature) {
                    $feature->update([
                        'description' => $request->feature_descrs[$index]
                    ]);
                } else {
                    ProductFeatures::create([
                        'product_id' => $product->product_id,
                        'name' => $name,
                        'description' => $request->feature_descrs[$index]
                    ]);
                }
            }
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description ?? '',
            'stock' => $request->stock,
            'category_id' => $request->category_id
        ]);

        return redirect()->back()->with(['success' => 'Product updated successfully']);
    }


    public function delete(Request $request)
    {
        $product_id = $request->product_id;
        $product = Product::where('product_id', $product_id)->first();

        if (!$product) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Product not found'
                ]
            );
        } else {
            if (isset($product->image) && $product->image != 'no-image.png') {
                $this->deleteImage("assets/src/images/product/{$product->image}");
            }
            $product->delete();

            return response()->json(
                [
                    'status' => true,
                    'message' => 'Product deleted successfully',
                    'product_id' => $product_id
                ]
            );
        }
    }


}
