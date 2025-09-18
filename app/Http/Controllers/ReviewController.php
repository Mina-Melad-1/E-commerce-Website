<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $product_id)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:500',
        ]);

        if (!Auth::check()) {
            toastr()->timeOut(5000)->closeButton()->addError('You must be logged in to submit a review');
            return redirect()->back();
        }

        // Check if user has already reviewed this product
        $existingReview = Review::where('user_id', Auth::id())
                               ->where('product_id', $product_id)
                               ->first();

        if ($existingReview) {
            toastr()->timeOut(5000)->closeButton()->addError('You have already reviewed this product');
            return redirect()->back();
        }

        Review::create([
            'product_id' => $product_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        toastr()->timeOut(5000)->closeButton()->addSuccess('Review Submitted Successfully');
        return redirect()->back();
    }
}