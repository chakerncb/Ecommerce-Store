<div>
    <a href="" class="main-btn">
        <i class="lni lni-cart"></i>
        <span class="total-items">{{$cartCount}}</span>
    </a>
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span>{{$cartCount}} Items</span>
            <a href="cart.html">View Cart</a>
    </div>
   <ul class="shopping-list">
        @foreach ($cartItems as $item)
        <li>
            <a wire:click="removefromCart({{$item->id}})" class="remove" title="Remove this item"><i
                    class="lni lni-close"></i></a>
            <div class="cart-img-head">
                <a class="cart-img" href="product-details.html"><img
                        src="{{URL::asset('assets/src/images/product/'.$item->options->path)}}" alt="#"></a>
            </div>

            <div class="content">
                <h4><a href="product-details.html">{{$item->name}}</a></h4>
                <p class="quantity">1x - <span class="amount">{{$item->price}}</span></p>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="bottom">
        <div class="total">
            <span>Total</span>
            <span class="total-amount">{{$cartTotal}}</span>
        </div>
        <div class="button">
            <a href="checkout.html" class="btn animate">Checkout</a>
        </div>
    </div>
</div>
