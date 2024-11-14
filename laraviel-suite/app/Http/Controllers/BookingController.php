<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;


class BookingController extends Controller
{
    public function showBooking(Request $request)
    {
        // Get the booking ID from the query parameter
        $bookingId = $request->query('bookingId'); // Or $request->input('bookingId')

        // Now you can use the booking ID to fetch the booking details from the 'guests' table
        $guest = Guest::where('booking_id', $bookingId)->first(); // Adjusted to use 'booking_id' column in 'guests' table

    
        // Return a view with the guest's booking details
        return view('categories.view_booking', compact('guest'));
    }
}
