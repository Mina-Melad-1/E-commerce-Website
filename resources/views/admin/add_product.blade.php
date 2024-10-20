<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')

    <style type="text/css">
        body {
            background-color: #121212; /* Dark background */
            color: #e0e0e0; /* Light gray text */
            font-family: 'Roboto', sans-serif; /* Modern font */
            margin: 0;
            padding: 20px;
        }

        .page-header h1 {
            text-align: center;
            margin-bottom: 40px;
            color: #64ffda; /* Bright teal color */
            text-shadow: 0 0 10px #64ffda; /* Glowing effect */
            font-size: 2.5em; /* Larger heading */
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Align items to the top */
            flex-direction: column;
            margin: 20px auto;
            padding: 30px;
            border-radius: 15px;
            background-color: #1e1e1e; /* Dark card background */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            max-width: 500px; /* Limit max width */
        }

        label {
            display: block;
            font-size: 18px;
            color: #64ffda; /* Bright label color */
            margin-bottom: 8px; /* Spacing between label and input */
        }

        input[type='text'],
        input[type='number'],
        textarea,
        select {
            width: 100%; /* Full width for inputs */
            padding: 12px;
            margin-bottom: 20px; /* Space between fields */
            border: 1px solid #64ffda; /* Bright border */
            border-radius: 8px;
            background-color: #333; /* Input background */
            color: #e0e0e0; /* Light text in inputs */
            transition: border-color 0.3s, background-color 0.3s; /* Transition for focus effect */
        }

        input[type='text']:focus,
        input[type='number']:focus,
        textarea:focus,
        select:focus {
            border-color: #76ff03; /* Lighter border on focus */
            background-color: #444; /* Darker input background on focus */
            outline: none; /* Remove default outline */
        }

        .input_deg {
            width: 100%;
            margin-bottom: 20px; /* Space between input fields */
        }

        .btn {
            background-color: #64ffda; /* Bright button color */
            border: none;
            color: #121212; /* Dark text on button */
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s; /* Transition for hover effect */
            margin-top: 10px; /* Space above button */
        }

        .btn:hover {
            background-color: #76ff03; /* Lighter button on hover */
            transform: translateY(-2px); /* Slight lift effect */
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .div_deg {
                width: 90%; /* Responsive width */
            }
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    
    <div class="page-content">
        <div class="page-header">
            <h1>Add Product</h1>
        </div>
        <div class="div_deg">
            <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input_deg">
                    <label>Product Title</label>
                    <input type="text" name="title" required>
                </div>

                <div class="input_deg">
                    <label>Description</label>
                    <textarea name="description" required></textarea>
                </div>

                <div class="input_deg">
                    <label>Price</label>
                    <input type="text" name="price">
                </div>

                <div class="input_deg">
                    <label>Quantity</label>
                    <input type="number" name="qty">
                </div>

                <div class="input_deg">
                    <label>Category</label>
                    <select name="category" required>
                        <option>Select an Option</option>
                        @foreach ($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input_deg">
                    <label>Product Image</label>
                    <input type="file" name="image">
                </div>

                <div class="input_deg">
                    <input class="btn" type="submit" value="Add Product">
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
</body>
</html>
