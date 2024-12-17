<div class="container">
    <div class="top-area">
        <div class="row align-items-center">
                <div class="title">
                    <div class="row">
                        <div class="col"><h4><b>My Wishlist</b></h4></div>
                    </div>
                </div>    
                @foreach ($products as $item )
                    <div class="row border-top border-bottom">
                        <div class="row main align-items-center">
                            <div class="col-2"><img class="img-fluid" src="{{URL::asset('assets/src/images/product/'.$item->path)}}"></div>
                            <div class="col">
                                <div class="row text-muted">{{$item->name}}</div>
                                <div class="row">{{$item->description}}</div>
                            </div>
                            <div class="col">
                                <a wire:click="decrement('{{$item->id}}')">-</a><a class="border">{{$item->qty}}</a><a wire:click="increment('{{$item->id}}')">+</a>
                            </div>
                            <div class="col">{{$item->price}} DZD
                                <span wire:click="removeFromWishlist({{$item->product_id}})" class="close">&#10005;</span>
                            </div>

                            <div class="col">
                                <button>add To cart</button>
                            </div>

                        </div>
                    </div>
                @endforeach
                <div class="back-to-shop"><a href="{{route('index')}}">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
    </div>
</div>