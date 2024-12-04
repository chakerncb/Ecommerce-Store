<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class AdminHomeController extends Controller
{
    
    public function index()
    {
        $productsCount = Product::count();
        $usersCount = User::count();

        return view('admin.dashboard' , compact('productsCount','usersCount'));
    }


}
