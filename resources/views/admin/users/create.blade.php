<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }
        
        .form_deg {
            background-color: rgb(43, 54, 74);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            width: 500px;
        }
        
        .input_deg {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            color: white;
            margin-bottom: 5px;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #f8f8f8;
            color: #333;
        }
        
        .btn-primary {
            background-color: #4CAF50;
            border: none;
            padding: 12px 0;
            margin-top: 10px;
            width: 180px;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .btn-secondary {
            background-color: #6c757d;
            border: none;
            padding: 12px 0;
            margin-top: 10px;
            width: 120px;
            border-radius: 5px;
            font-size: 16px;
            color: white;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-primary:hover {
            background-color: #45a049;
        }
        
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        
        .button-group {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 style="color:white; margin-bottom: 20px;">Add New User</h1>
                
                <div class="div_deg">
                    <form class="form_deg" action="{{ url('store_user') }}" method="post">
                        @csrf
                        
                        <div class="input_deg">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="input_deg">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="input_deg">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="input_deg">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" value="{{ old('address') }}">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="input_deg">
                            <label for="usertype">User Type</label>
                            <select id="usertype" name="usertype" required>
                                <option value="user" {{ old('usertype') == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('usertype') == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('usertype')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="input_deg">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="input_deg">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        
                        <div class="button-group">
                            <button type="submit" class="btn btn-primary">Create User</button>
                            <a href="{{ url('view_users') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <!-- JavaScript files-->
    @include('admin.js')
</body>
</html>