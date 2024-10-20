<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @include('home.css')
    <style>
        /* Custom styles for the table */
        .custom-table {
            border: 1px solid #ced4da; /* Light border for the entire table */
            border-radius: 0.5rem; /* Rounded corners */
            background-color: #ffffff; /* White background for the table */
            color: #212529; /* Dark text color for readability */
            margin: 15px;
            margin-left: 0px;
        }
    
        .custom-table th,
        .custom-table td {
            border: 2px solid gray ; /* Light border for cells */
            padding: 10px; /* Add some padding */
            text-align: center; /* Center align text */
            vertical-align: middle; /* Vertical center align */
        }
    
        .custom-table th {
            font-weight: bold; /* Bold text for headers */
            background-color: black; 
            color:white;
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
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')

        <div>

            <table class="table table-bordered table-light table-hover custom-table">
                <tr>
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Image</th>
                </tr>
                @foreach ($order as $order)
                <tr>
                    <td>{{$order->product->title}}</td>
                    <td>$ {{$order->product->price}}</td>
                    <td>{{$order->status}}</td>
                    <td>
                        <img width="180" src="products/{{$order->product->image}}">
                    </td>
                </tr>
                @endforeach
            </table>

        </div>
    </div>

    @include('home.footer')
</body>
</html>