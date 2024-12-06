<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    //

    function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        return view('admin.order.index');
    }
}
