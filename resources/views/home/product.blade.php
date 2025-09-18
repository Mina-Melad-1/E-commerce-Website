<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Latest Products</h2>
            <form style="margin-top: 40px;" action="{{url('search')}}" method="get">
                @csrf
                <div class="input-group mb-3">
                    <input type="search" name="sear" class="form-control" placeholder="Search By Product Title Or Category" value="{{ request()->get('sear') }}">
                    <button class="btn btn-success" type="submit" style="height: auto;"><i class="bi bi-search"></i> Search</button>
                </div>
            </form>
        </div>
        <div class="row">
            @forelse ($product as $products)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="box product-card">
                        <div class="img-box">
                            <img height="300" width="300" src="products/{{$products->image}}" alt="{{$products->title}}" class="img-fluid">
                        </div>
                        <div class="detail-box text-center">
                            <h5 class="product-title">{{$products->title}}</h5>
                            <h5 class="product-price">Price: <span style="color: rgb(220, 46, 46)">${{$products->price}}</span></h5>
                            <p class="product-reviews">
                                <i class="bi bi-star-fill text-warning"></i>
                                {{ $products->reviews->count() }} Review{{ $products->reviews->count() != 1 ? 's' : '' }}
                            </p>
                        </div>
                        <div class="btn-group d-flex justify-content-center gap-2 p-3">
                            <a class="btn btn-success" href="{{url('product_details',$products->id)}}"><i class="bi bi-eye"></i> Details</a>
                            <a href="{{url('add_cart',$products->id)}}" class="btn btn-info"><i class="bi bi-cart-fill"></i> Add to Cart</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No products found.</p>
                </div>
            @endforelse
        </div>
        @if ($product instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="d-flex justify-content-center mt-4">
                {{ $product->links() }}
            </div>
        @endif
    </div>
</section>
