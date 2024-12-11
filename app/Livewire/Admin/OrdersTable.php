<?php

namespace App\Livewire\Admin;

use App\Models\Invoice;
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
    public $searchContent = '';

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

    public function search() {
        $this->start = 0;
        $this->page = 1;
        $this->dispatch('orderStatusUpdated');
    }

//FIXME : make this function stream the pdf file not download it .
    public function streamPdf($order_id)
    {

            $invoice = Invoice::select(
                'inv_path',
                        'inv_order_id',
                )->where('inv_order_id', $order_id)->first();

            if ($invoice) {
                // return \Illuminate\Support\Facades\Storage::disk('invoices')->streamDownload('/' . $invoice->inv_path);         
                return response()->streamDownload(function () use ($invoice) {
                    echo \Illuminate\Support\Facades\Storage::disk('invoices')->get($invoice->inv_path);
                }, $invoice->inv_path);
            } else {
                session()->flash('error', 'Invoice not found');
            }
            
            
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

        if ($this->searchContent) {
            $query->where('shipping_fullname', 'like', '%' . $this->searchContent . '%');
        }

        $this->subsetOrders = $query->get();

        return view('livewire.admin.orders-table', ['subsetOrders' => $this->subsetOrders]);
    }

}
