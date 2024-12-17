<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\wishlist;
use Livewire\Component;

class WishlistPage extends Component
{
    protected $listeners = ['refreshWishlist' => 'render'];




    public function render()
    {
        $wishlist = wishlist::where(
                     'user_id',
                      auth()->id()
                    )->get();

        $products = [];
        foreach ($wishlist as $item){
            $product = Product::find($item->product_id);
            $product->qty = $item->quantity;
            $products[] = $product;
        } 

        
        
        return view('livewire.wishlist-page' , compact('products'));
    }

    # FIXME: Implement the removeFromWishlist method

    public function removeFromWishlist($product_id)
    {
        $wishlist = wishlist::where(
            'user_id',
            auth()->id()
        )->where('product_id', $product_id)->first();

        $this->dispatch('refreshWishlist');
    }




    public function addToCart($product_id)
    {
        // $wishlist = wishlist::where(
        //     'user_id',
        //     auth()->id()
        // )->where('product_id', $product_id)->first();

        // $wishlist->delete();
        // $this->render();
    }

    public function clearWishlist()
    {
        // $wishlist = wishlist::where(
        //     'user_id',
        //     auth()->id()
        // )->get();

        // foreach ($wishlist as $item){
        //     $item->delete();
        // }

        // $this->render();
    }

}
