<?php

namespace App\Http\Controllers;

use App\Models\CarrerHistory;
use App\Models\Review;
use Illuminate\Http\Request;

class CarrerHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kritiksaran = Review::where('rating', 5)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        return view('carrerhistory', compact('kritiksaran'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CarrerHistory $carrerHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarrerHistory $carrerHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarrerHistory $carrerHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarrerHistory $carrerHistory)
    {
        //
    }
}