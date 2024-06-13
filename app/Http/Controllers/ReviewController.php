<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Exception;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('review');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'rating-input' => 'required|numeric', // Ensure numeric to accept doubles
                'name' => 'required|string|max:255',
                'title' => 'required|string|max:255',
                'description' => 'required|string',
            ]);

            // Convert the rating input to double
            $rating = (float) $validatedData['rating-input'];

            // Create a new review instance
            $review = new Review;
            $review->rating = $rating;
            $review->nama = $validatedData['name'];
            $review->title = $validatedData['title'];
            $review->description = $validatedData['description'];
            $review->save();

            // Return a success response
            return redirect()->route('review')->with('success', 'Kritik & Saran berhasil dikirim.');
        } catch (Exception $e) {
            return back()->with('error', 'Kritik & Saran gagal dikirim: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
