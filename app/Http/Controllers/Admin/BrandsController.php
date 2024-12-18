<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index() {
        return view('admin.brands.index');
    }

    public function create(BrandRequest $request) {
        $brand = Brand::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json(['message' => 'brand Created Successfully']);
    }

    public function update(BrandRequest $request) {
        $brand = Brand::find($request->id);

        if(!$brand) {
            return response()->json(['message' => 'brand Not Found'], 404);
        }

        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();

        return response()->json(['message' => 'brand Updated Successfully']);

    }

}
