<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use App\Traits\StoreInfoTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    use StoreInfoTrait;

    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {            
        

        $categories = Category::select(
                       'category_id',
                       'name'
                    )->get()->keyBy('category_id');


        $store = $this->getStoreInfo();
        
         return view('front.index')
                      ->with([
                        'categories' => $categories,
                        'store' => $store
                         ]);
    }
}
