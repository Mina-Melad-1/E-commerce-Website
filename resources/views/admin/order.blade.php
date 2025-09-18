<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<head> 
    @include('admin.css')
    <style>
        .custom-table {
            border: 1px solid #6c757d;
            border-radius: 0.5rem; 
            background-color: #343a40;
            color: #f8f9fa; 
            width: 100%;
            table-layout: auto;
        }
        .custom-table th,
        .custom-table td {
            border: 1px solid #495057; 
            padding: 10px; 
            text-align: center; 
            vertical-align: middle;
        }
        .custom-table th {
            background-color: #212529; 
            font-weight: bold;
        }
        .custom-table td img {
            border: 1px solid #6c757d; 
            border-radius: 0.25rem; 
            max-width: 100px;
            height: auto;
        }
        .custom-table tbody tr:hover {
            background-color: #495057; 
            color: #f8f9fa;
        }
    </style>
</head>
<body>
    @include('admin.header')

    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <div class="table-responsive">
                    <table class="table table-bordered table-dark table-hover custom-table">
                        <tr>
                            <th>Customer name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Product title</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Change Status</th>
                        </tr>
                        @foreach ($data as $data)
                        <tr>
                            <td>{{$data->name}}</td>    
                            <td>{{$data->rec_address}}</td>
                            <td>{{$data->phone}}</td>
                            <td>{{$data->product->title}}</td>
                            <td>{{$data->product->price}}</td>
                            <td>
                                <img src="/products/{{$data->product->image}}" alt="Product Image">
                            </td>
                            <td>{{$data->payment_status}}</td>
                            <td>
                                @if ($data->status == 'in progress')
                                    <span style="color: red">{{$data->status}}</span>
                                @elseif ($data->status == 'On the way')
                                    <span style="color: yellow">{{$data->status}}</span>
                                @else
                                    <span style="color: rgb(31, 196, 31)">{{$data->status}}</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{url('on_the_way',$data->id)}}">On the way</a>
                                <a style="margin-top: 20px" class="btn btn-success" href="{{url('delivered',$data->id)}}">Delivered</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    @include('admin.js')
</body>
</html>
