<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<section class="shop_section layout_padding">
    <div class="container">
    <div class="heading_container heading_center">
        <h2>
        Latest Products
        </h2>
            <form style="margin-top: 40px;" action="{{url('search')}}" method="get">
                @csrf
                <input type="search" name="sear" placeholder="Search By Product Title Or Category" value="{{ request()->get('sear') }}">
                <input style="height: 35px" type="submit" class="btn btn-success" value="Search">
            </form>
            
    </div>
    <div class="row">


        @foreach ($product as $products)


            
        <div class="col-sm-5 col-md-4 col-lg-3.2">
        <div class="box">
            <div class="img-box">
                <img height="300" width="300" src="products/{{$products->image}}" alt="">
            </div>
            <div class="detail-box">
                <h5>{{$products->title}}</h5>
                <h5>Price
                <span style="color: rgb(220, 46, 46)">${{$products->price}}</span>
                </h5>
            </div>

            <div style="padding:15px">
                <a class="btn btn-success" style="padding-left: 15px" href="{{url('product_details',$products->id)}}">Details</a>
                <a href="{{url('add_cart',$products->id)}}" class="btn btn-info" style="margin-left: 80px;"><i class="bi bi-cart-fill"></i> Add to Cart
                </a>
            </div>
            

        </div>
        </div>
        @endforeach

    </div>
    </div>
</section>