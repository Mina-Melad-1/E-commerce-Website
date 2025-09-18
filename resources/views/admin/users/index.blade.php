<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')

    <style type="text/css">
    .div_deg
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 40px; 
    }

    .table_deg
    {
        border: 2px solid rgb(116, 143, 180);
        width: 90%;
        margin: auto;
    }

    th
    {
        background-color: rgb(67, 110, 127);
        color: white;
        font-size: 16px;
        font-weight: bold;
        padding: 10px;
    }

    td
    {
        border: 1px solid skyblue;
        text-align: center;
        color: white;
        padding: 8px;
    }

    input[type='search']
    {
        width: 400px;
        height: 40px;
        margin-left: 50px;
    }

    .user-type-admin {
        color: #4CAF50;
        font-weight: bold;
    }

    .user-type-user {
        color: #2196F3;
    }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')
    
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 style="color:white; margin-bottom: 20px;">Manage Users</h1>

                <form action="{{ url('user_search') }}" method="get">
                    @csrf
                    <input type="search" name="search" placeholder="Search by Name, Email or Phone">
                    <input type="submit" class="btn btn-secondary" value="Search">
                </form>
                <div style="margin: 20px 0; text-align: right; padding-right: 5%;">
    <a href="{{ url('create_user') }}" class="btn btn-primary">
        <i class="fa fa-plus"></i> Add New User
    </a>
</div>

                <div class="div_deg">
                    <table class="table_deg">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>User Type</th>
                            <th>Created At</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone ?? 'N/A' }}</td>
                            <td>{{ $user->address ?? 'N/A' }}</td>
                            <td class="user-type-{{ $user->usertype }}">{{ ucfirst($user->usertype) }}</td>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ url('edit_user', $user->id) }}">Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" onclick="confirmDelete(event, {{ $user->id }})" href="#">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                
                <div class="div_deg" style="margin-top: 20px;">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    
    <!-- JavaScript files-->
    @include('admin.js')
    
    <script>
        function confirmDelete(event, userId) {
            event.preventDefault();
            
            if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
                window.location.href = "{{ url('delete_user') }}/" + userId;
            }
        }
    </script>
</body>
</html>