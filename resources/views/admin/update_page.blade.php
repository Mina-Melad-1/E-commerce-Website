<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')
    <style type="text/css">
    .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    h2 {
        color: white;
    }

    label {
        display: inline-block;
        width: 200px;
        padding: 15px;
        font-size: 18px !important;
        color: white !important;
    }

    input[type='text'], input[type='number'] {
        width: 300px;
        height: 60px;
    }

    textarea {
        width: 450px;
        height: 100px;
    }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2>Update Product</h2>
                <div class="div_deg">
                    <form action="{{url('edit_product',$data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label>Title</label>
                            <input type="text" name="title" value="{{$data->title}}">
                        </div>
                        <div>
                            <label>Description</label>
                            <textarea name="description">{{$data->description}}</textarea>
                        </div>
                        <div>
                            <label>Price</label>
                            <input type="number" name="price" value="{{$data->price}}">
                        </div>
                        <div>
                            <label>Quantity</label>
                            <input type="number" name="quantity" value="{{$data->quantity}}">
                        </div>
                        <div>
                            <label>Category</label>
                            <select name="category_id">
                                <option value="{{$data->category->id}}" selected>{{$data->category->category_name}}</option>
                                @foreach ($category as $cat)
                                    @if ($cat->id != $data->category->id)
                                        <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Current Image</label>
                            <img width="120" height="120" src="/products/{{$data->image}}">
                        </div>
                        <div>
                            <label>New Image</label>
                            <input type="file" name="image">
                        </div>
                        <div>
                            <input class="btn btn-success" type="submit" value="Update Product">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('admin.js')
</body>
</html>
