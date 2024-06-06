<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reservation');
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
        $validator = Validator::make($request->all(), [
            'reservation_date' => 'required|date_format:Y-m-d H:i:s',
            'name_reserve' => 'required|string|max:255',
            'email_reserve' => 'required|email',
            'telephone_reserve' => 'required|string|max:15',
            'people' => 'required|integer|min:1',
            'terms' => 'required'
            // Additional validation rules as necessary
        ]);

        if ($validator->fails()) {
            return response()->json(['success' => false, 'message' => $validator->errors()->first()], 400);
        }

        try {
            // Save the reservation to the database
            $reservation = new Reservation();
            $reservation->reservation_date = $request->reservation_date;
            $reservation->nama = $request->name_reserve;
            $reservation->email = $request->email_reserve;
            $reservation->phone = $request->telephone_reserve;
            $reservation->person = $request->people;
            $reservation->status = "Pending";
            $reservation->keterangan = $request->opt_message_reserve ?? null;
            $reservation->save();

            return response()->json(['success' => true, 'message' => 'Reservation saved successfully!']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to save reservation.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
