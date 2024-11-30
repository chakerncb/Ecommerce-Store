<div class="row">
    @foreach ($products as $product)
    <div class="col-lg-3 col-md-6 col-12">
    <div class="single-product">
        <div class="product-image">
            @foreach ($product->images as $image)   
            <img src="{{URL::asset('assets/src/images/product/'.$image->path)}}" alt="Product" />
            @break
          @endforeach                            
             <div class="button">
                <form wire:submit.prevent="addToCart({{$product->product_id}})" method="POST">
                    <input wire:model="quantity.{{$product->product_id}}" type="hidden">
                    <button type="submit" class="btn"><i class="lni lni-cart"></i> Add to Cart</button>
                </form>
            </div>
        </div>
        <div class="product-info">
            <span class="category">Watches</span>
            <h4 class="title">
                <a href="{{route('product.details', $product->name)}}">{{$product->name}}</a>
            </h4>
            <ul class="review">
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star"></i></li>
                <li><span>4.0 Review(s)</span></li>
            </ul>
            <div class="price">
                <span>${{$product->price}}</span>
            </div>
        </div>
    </div>
</div>
    @endforeach
</div>