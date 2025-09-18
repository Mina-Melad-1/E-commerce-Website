<!DOCTYPE html>
<html>
<head>
    @include('home.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style type="text/css">
        .shop_section {
            padding: 50px 0;
        }

        .heading_container h2 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
        }

        .product-details-container {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-bottom: 30px;
        }

        .product-image {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            border: 1px solid #eee;
            margin-bottom: 20px;
        }

        .detail-box {
            padding: 15px 0;
        }

        .product-title {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: 600;
            color: #dc2e2e;
            margin-bottom: 10px;
        }

        .product-info {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 10px;
        }

        .product-description {
            font-size: 1rem;
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .btn-add-to-cart {
            font-size: 1rem;
            padding: 10px 20px;
            border-radius: 25px;
            background-color: #17a2b8;
            border-color: #17a2b8;
            transition: background-color 0.3s ease;
        }

        .btn-add-to-cart:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        .review-section {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #eee;
        }

        .review-section h4 {
            font-size: 1.75rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .review-form {
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .review-form .form-group {
            margin-bottom: 15px;
        }

        .review-form label {
            font-weight: 500;
            color: #444;
        }

        .review-form .form-control {
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .review-form .btn-primary {
            border-radius: 25px;
            padding: 8px 20px;
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
        }

        .review-form .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .review-item {
            background-color: #fff;
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .review-item strong {
            font-size: 1.1rem;
            color: #333;
        }

        .rating-stars {
            color: #f1c40f;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .review-comment {
            font-size: 0.95rem;
            color: #666;
            line-height: 1.5;
            margin-top: 5px;
        }

        .review-date {
            font-size: 0.85rem;
            color: #999;
        }

        .login-prompt {
            font-size: 1rem;
            color: #555;
        }

        .login-prompt a {
            color: #007bff;
            text-decoration: none;
        }

        .login-prompt a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .product-title {
                font-size: 1.5rem;
            }

            .product-price {
                font-size: 1.25rem;
            }

            .product-info, .product-description {
                font-size: 0.95rem;
            }

            .btn-add-to-cart {
                font-size: 0.9rem;
                padding: 8px 15px;
            }

            .review-section h4 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
<div class="hero_area">
    @include('home.header')
</div>

<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>Product Details</h2>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="product-details-container">
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img src="/products/{{$data->image}}" alt="{{$data->title}}" class="product-image">
                        </div>
                        <div class="col-md-6">
                            <div class="detail-box">
                                <h1 class="product-title">{{$data->title}}</h1>
                                <h3 class="product-price">${{$data->price}}</h3>
                                <p class="product-info"><strong>Category:</strong> {{$data->category->category_name}}</p>
                                <p class="product-info"><strong>Available Quantity:</strong> {{$data->quantity}}</p>
                                <p class="product-description"><strong>Description:</strong> {{$data->description}}</p>
                                <a href="{{url('add_cart',$data->id)}}" class="btn btn-add-to-cart">
                                    <i class="bi bi-cart-fill"></i> Add to Cart
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Review Section -->
                    <div class="review-section">
                        <h4>Customer Reviews ({{ $data->reviews->count() }})</h4>

                        <!-- Review Form -->
                        @if (Auth::check())
                            <div class="review-form">
                                <form action="{{ route('review.store', $data->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="rating">Rating (1-5):</label>
                                        <select name="rating" id="rating" class="form-control" required>
                                            <option value="1">1 Star</option>
                                            <option value="2">2 Stars</option>
                                            <option value="3">3 Stars</option>
                                            <option value="4">4 Stars</option>
                                            <option value="5">5 Stars</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Comment (Optional):</label>
                                        <textarea name="comment" id="comment" class="form-control" rows="4" maxlength="500" placeholder="Share your thoughts about the product..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Review</button>
                                </form>
                            </div>
                        @else
                            <p class="login-prompt">Please <a href="{{ url('/login') }}">log in</a> to submit a review.</p>
                        @endif

                        <!-- Display Reviews -->
                        @if ($data->reviews->count() > 0)
                            @foreach ($data->reviews as $review)
                                <div class="review-item">
                                    <p><strong>{{ $review->user->name }}</strong> rated {{ $review->rating }} star{{ $review->rating > 1 ? 's' : '' }}</p>
                                    <p class="rating-stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $review->rating)
                                                <i class="bi bi-star-fill"></i>
                                            @else
                                                <i class="bi bi-star"></i>
                                            @endif
                                        @endfor
                                    </p>
                                    @if ($review->comment)
                                        <p class="review-comment">{{ $review->comment }}</p>
                                    @endif
                                    <small class="review-date">Posted on {{ $review->created_at->format('F j, Y') }}</small>
                                </div>
                            @endforeach
                        @else
                            <p>No reviews yet. Be the first to review this product!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('home.footer')
</body>
</html>