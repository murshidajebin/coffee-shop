<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
   public function index()
    {
        $reviews = Review::latest()->get();
        return view('customer.reviews', compact('reviews'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'review' => 'required'
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'review' => $request->review
        ]);

        return back()->with('success','Review submitted!');
    }
}

