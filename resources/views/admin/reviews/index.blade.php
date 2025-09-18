<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
            margin-bottom: 30px;
        }

        .table_container {
            width: 100%;
            overflow-x: auto;
            padding: 0 15px;
        }

        .table_deg {
            border: 2px solid rgb(116, 143, 180);
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #2c3e50;
        }

        th {
            background-color: rgb(67, 110, 127);
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px;
            text-align: center;
            border: 1px solid rgb(116, 143, 180);
        }

        td {
            border: 1px solid skyblue;
            text-align: center;
            color: white;
            padding: 12px;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #34495e;
        }

        tr:hover {
            background-color: #3e5c76;
        }

        .btn-danger {
            padding: 8px 15px;
            font-size: 14px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .pagination {
            margin-top: 20px;
        }

        .pagination .page-link {
            color: #17a2b8;
            border: 1px solid #17a2b8;
            border-radius: 5px;
            margin: 0 3px;
            padding: 8px 12px;
        }

        .pagination .page-link:hover {
            background-color: #17a2b8;
            color: white;
        }

        .pagination .page-item.active .page-link {
            background-color: #17a2b8;
            color: white;
            border-color: #17a2b8;
        }

        @media (max-width: 768px) {
            th, td {
                font-size: 14px;
                padding: 10px;
            }

            .btn-danger {
                padding: 6px 10px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2>Product Reviews</h2>
                <div class="div_deg">
                    <div class="table_container">
                        <table class="table_deg">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>User</th>
                                    <th>Rating</th>
                                    <th>Comment</th>
                                    <th>Posted On</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reviews as $review)
                                    <tr>
                                        <td>{{ $review->product->title }}</td>
                                        <td>{{ $review->user->name }}</td>
                                        <td>{{ $review->rating }} Star{{ $review->rating > 1 ? 's' : '' }}</td>
                                        <td>{{ $review->comment ?? 'N/A' }}</td>
                                        <td>{{ $review->created_at->format('F j, Y') }}</td>
                                        <td>
                                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('delete_review', $review->id) }}">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">No reviews found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="div_deg">
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    </div>

    @include('admin.js')
</body>
</html>