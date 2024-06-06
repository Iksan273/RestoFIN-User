<?php

namespace App\Http\Controllers;

use App\Models\Review;
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
        // Validasi input
        $validatedData = $request->validate([
            'rating-input' => 'required|double',
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Buat review baru
        $review = new Review();
        $review->rating = $validatedData['rating-input'];
        $review->nama = $validatedData['name'];
        $review->title = $validatedData['title'];
        $review->description = $validatedData['description'];

        // Simpan review
        if ($review->save()) {
            return response()->json(['success' => true, 'message' => 'Review berhasil disimpan']);
        } else {
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan saat menyimpan review'], 500);
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
