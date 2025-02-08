<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    //

    public function index($ctgName) {
        
        $categoryId = Category::where('name' , $ctgName)->first()->category_id;

        return view('front.categoryPage' , ['ctgName' => $ctgName , 'categoryId' => $categoryId]);
    }
}
