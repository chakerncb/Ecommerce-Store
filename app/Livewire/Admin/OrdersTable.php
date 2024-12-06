<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class OrdersTable extends Component
{
    public function render()
    {
        $orders = Order::select([
            'ord_id',
            'costumer_id',
            'total',
            'status',
            'payment_method',
            'payment_status',
            'shipping_fullname',
            'shipping_address',
            'shipping_city',
            'shipping_municipality',
            'shipping_phone',
            'shipping_email',
            'shipping_method',
            'shipping_status',
            'created_at'

        ])->get();	

        return view('livewire.admin.orders-table' , compact('orders'));
    }
}
