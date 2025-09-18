<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style type="text/css">
.div_deg {
    display: flex;
    justify-content: center;
    align-items: flex-start; /* Align items to the top */
    margin: 50px;
    gap: 40px; /* Add space between form and table */
}
        .cart_value {
            text-align: center;
            margin-bottom: 20px;
            padding: -30px;
            padding left: 0px;
        }

        .order_deg {
    padding-right: 110px;
    margin-top: 10px;
    padding-top: 0px;
    margin-bottom: 50px; /* Add more space below the form */
}
        label {
            display: inline-block;
        }
        /* Custom styles for the table */
        .custom-table {
    border: 1px solid #ced4da;
    border-radius: 0.5rem;
    background-color: #c46666;
    color: #212529;
    margin-bottom: 40px;
    margin-right: 150px;
    margin-top: 50px; /* Add space above the table */
}
    
.custom-table th,
.custom-table td {
    border: 2px solid gray;
    padding: 10px;
    text-align: center;
    vertical-align: middle;
}
    
        .custom-table th {
            font-weight: bold; /* Bold text for headers */
            background-color: black; 
            color:black;
        }
    
        .custom-table td img {
            border: 2px solid #4686c5; /* Border around images */
            border-radius: 0.25rem; /* Rounded image corners */
        }
    
        /* Hover effect for table rows */
        .custom-table tbody tr:hover {
            background-color: #e9ecef; /* Light gray for row hover effect */
            color: #212529; /* Ensure text remains readable */
        }

        

        .dark-mode .custom-table {
    background-color: #1a1a1a !important;
    color: #fff !important;
}
.dark-mode .custom-table th,
.dark-mode .custom-table td {
    background-color: #1a1a1a !important;
    border-color: #444 !important;
}
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
    </div>
    <div class="div_deg">
        <div class="order_deg">
            <div class="card p-5 shadow-sm">
                <h2 class="text-center mb-4">Place Your Order</h2>
                <form action="{{url('confirm_order')}}" method="Post">
                    @csrf
                    <div class="mb-3">
                        <label for="receiverName" class="form-label">Receiver Name</label>
                        <input type="text" class="form-control" id="receiverName" name="name" value="{{Auth::user()->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="receiverAddress" class="form-label">Receiver Address</label>
                        <textarea class="form-control" id="receiverAddress" name="address" rows="3">{{Auth::user()->address}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="receiverPhone" class="form-label">Receiver Phone</label>
                        <input type="text" class="form-control" id="receiverPhone" name="phone" value="{{Auth::user()->phone}}">
                    </div>
                    <div class="d-grid">
                        <input style="margin: 5px" class="btn btn-success btn-lg" type="submit" value="Cash On Delivery">
                    </div>
                    <div class="d-grid">
                        <a href="{{url('stripe')}}" style="margin: 5px" class="btn btn-primary btn-lg">
                            Pay Using Card
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <table class="table table-bordered table-light table-hover custom-table">
            <tr>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Remove</th>
            </tr>

            <?php
            $value = 0;
            ?>
            @foreach ($cart as $cart)

            <tr>
                <td>{{$cart->product->title}}</td>
                <td>$ {{$cart->product->price}}</td>
                <td>
                    <img width="150" src="/products/{{$cart->product->image}}" alt="">
                </td>
                <td>
                    <a class="btn btn-danger" href="{{url('delete_cart',$cart->id)}}">Remove</a>
                </td>
            </tr>
            <?php
            $value = $value + $cart->product->price
            ?>
            @endforeach
        </table>
    </div>

    <div class="cart_value">
        <h2>Total Value of Cart is : ${{$value}}</h2>
    </div>

    @include('home.footer')

</body>

</html>
