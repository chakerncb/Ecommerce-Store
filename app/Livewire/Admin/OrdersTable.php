<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class OrdersTable extends Component
{

    protected $listeners = ['orderStatusUpdated' => 'render'];

    public $start = 0;
    public $limits = 10;
    public $subsetOrders;

    public $page = 1;

    public $status = 'all';
    

    public function loadMore()
    {
        if($this->start + $this->limits < Order::count()) {
            $this->start += 10;
            $this->page++;
            $this->render();  
        }
    }

    public function loadLess()
    {
        if($this->start > 0) {
            $this->start -= 10;
            $this->page--;
            $this->render();
        }
    }

    public function filterByStatus()
    {
        $this->start = 0;   
        $this->page = 1;  
        $this->dispatch('orderStatusUpdated');           
     }

    public function render()
    {
        $query = Order::select([
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
        ])->skip($this->start)
          ->take($this->limits);

        if ($this->status !== 'all') {
            $query->where('status', $this->status);
        }

        $this->subsetOrders = $query->get();

        return view('livewire.admin.orders-table', ['subsetOrders' => $this->subsetOrders]);
    }
}
