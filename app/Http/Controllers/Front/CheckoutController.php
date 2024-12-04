<?php

namespace App\Http\Controllers\front;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Facades\Invoice;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $cartItems = Cart::content();
        
        $Cart = new \stdClass();
        $Cart->total = Cart::total();
        $Cart->count = Cart::count();
        $Cart->subtotal = Cart::subtotal();
        $Cart->tax = Cart::tax();
        $Cart->discount = 0;


        if ($cartItems->count() == 0) {
            return redirect()->back()->with('error', 'Your cart is empty');
        }
    

        return view('front.checkout', compact('Cart','cartItems'));
    }

    public function store(OrderRequest $request){

        if(auth()->check()){

            // $address = auth()->user()->addresses()->create([
            //     'address' => $request->shipping_address,
            //     'city' => $request->shipping_city,
            //     'phone' => $request->shipping_phone,
            //     'fullname' => $request->shipping_fullname,
            // ]);

            $order = Order::create([
            'costumer_id' => auth()->user()->id,
            'total' => str_replace(',', '', Cart::total()),
            'status' => 'pending',
            'payment_method' => $request->pay_method,
            'payment_status' => 'pending',
            'shipping_fullname' => $request->name,
            'shipping_method' => $request->chip_method,
            'shipping_address' => $request->address,
            'shipping_city' => $request->wilaya,
            'shipping_municipality' => $request->municipality,
            'shipping_phone' => $request->phone,
            'shipping_email' => $request->email,
            'shipping_status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Order has been placed successfully',
        ]);

        }

        else {
            $order = Order::create([
                'costumer_id' => 0,
                'total' => str_replace(',', '', Cart::total()),
                'status' => 'pending',
                'payment_method' => $request->pay_method,
                'payment_status' => 'pending',
                'shipping_fullname' => $request->name,
                'shipping_method' => $request->chip_method,
                'shipping_address' => $request->address,
                'shipping_city' => $request->wilaya,
                'shipping_municipality' => $request->municipality,
                'shipping_phone' => $request->phone,
                'shipping_email' => $request->email,
                'shipping_status' => 'pending',
            ]);

            if(!$order){
                return response()->json([
                    'message' => 'Order has not been placed',
                ]);
            }


            

            return response()->json([
                'message' => 'Order has been placed successfully',
                'url' => '/invoice/'.$order->ord_id,
            ]);
        }
   }


    public function invoice($ord_id)
    {

        $order = Order::find($ord_id);
        if(!$order){
            return redirect()->back()->with('error', 'Order not found');
        }

        $costumer = $order->costumer_id == 0 ? 'Guest' : $order->costumer->name;
        $shipping = new \stdClass();
        $shipping->fullname = $order->shipping_fullname;
        $shipping->address = $order->shipping_address;
        $shipping->city = $order->shipping_city;
        $shipping->municipality = $order->shipping_municipality;
        $shipping->phone = $order->shipping_phone;
        $shipping->email = $order->shipping_email;


        $cartItems = Cart::content();
        $Cart = new \stdClass();
        $Cart->total = Cart::total();
        $Cart->count = Cart::count();
        $Cart->subtotal = Cart::subtotal();
        $Cart->tax = Cart::tax();
        $Cart->discount = 0;

          $data = [
            'order' => $order,
            'costumer' => $costumer,
            'shipping' => $shipping,
            'cartItems' => $cartItems,
            'Cart' => $Cart,
            ];
         

            $customer = new Buyer([
                'name'          => $costumer,
                'custom_fields' => [
                    'email' => $shipping->email,
                    'phone' => $shipping->phone,
                    'address' => $shipping->address,
                    'city' => $shipping->city,
                    'municipality' => $shipping->municipality,
                ],
            ]);

            $invoice = Invoice::make()
                ->buyer($customer)
                ->discountByPercent($Cart->discount)
                ->taxRate($Cart->tax)
                ->shipping(0);

            foreach ($cartItems as $item) {
                $invoiceItem = (new InvoiceItem())
                    ->title($item->name)
                    ->pricePerUnit($item->price)
                    ->quantity($item->qty);

                $invoice->addItem($invoiceItem);
            }
            
            return $invoice->download();
    }
}
