<section class="trending-product section d-flex">

 {{-- FIXME: fix the filtering by the brand  --}}

    <div class="filter-category-card">
        <h3>Filter :</h3>
        <div class="filter-category">
            <br>
            <div class="filter-category-title">
                <h6>by Brand</h6>
            </div>
            <select name="brand" id="brand" class="filter-category-select" wire:model="brandId">
                <option value="0">All</option>
                @foreach ($brands as $brand)
                    <option value="{{$brand->brand_id}}">{{$brand->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="filter-category">
            <br>
            <div class="filter-category-title">
                <h6>Rating <i class="lni lni-star-filled" style="color: #fbff17"></i></h6>
            </div>
            <select name="rating" id="rating" class="filter-category-select">
                <option value="all">All</option>
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
        </div>
    </div>
    <br>
    <div class="container" style="background-color: #ffffff;">
        <div class="row">
            @foreach ($products as $product)
                @if ($product->stock != 0)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-product">
                            <div class="product-image">
                                @if ($product->images->isNotEmpty())
                                    @foreach ($product->images as $image)
                                        <img src="{{URL::asset('assets/src/images/product/'.$image->path)}}" alt="Product" />
                                        @break
                                    @endforeach
                                @else
                                    <img src="{{URL::asset('assets/src/images/product/no-image.png')}}" alt="Default Product" />
                                @endif
                                <div class="button">
                                    <button wire:click="ToCart({{$product->product_id}})" class="btn"><i class="lni lni-cart"></i> Add To Cart</button>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">{{$product->category_name}}</span>
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
                @endif
            @endforeach
        </div>
    </div>
</section>