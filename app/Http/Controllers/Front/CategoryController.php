<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //

    public function index($ctgName) {
        return view('front.categoryPage' , ['ctgName' => $ctgName]);
    }
}
