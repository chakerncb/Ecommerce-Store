<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class AdminHomeController extends Controller
{
    
    public function index()
    {
        $OrdersCount = Order::count();
        $usersCount = User::count();

        return view('admin.dashboard' , compact('OrdersCount','usersCount'));
    }


}
