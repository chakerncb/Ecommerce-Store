<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index($ctgName) {
        return view('front.categoryPage' , ['ctgName' => $ctgName]);
    }
}
