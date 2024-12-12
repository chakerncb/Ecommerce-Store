<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index() {
        return view('admin.category.index');
    }

    public function create(CategoryRequest $request) {
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json(['message' => 'Category Created Successfully']);
    }

    public function update(CategoryRequest $request) {
        $category = Category::find($request->id);

        if(!$category) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return response()->json(['message' => 'Category Updated Successfully']);

    }

}
