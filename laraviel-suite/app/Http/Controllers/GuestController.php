<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendReceipt;  // Use your SendReceipt Mailable
use App\Models\Feedback;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $feedbacks = Feedback::with('guest')->latest()->take(10)->get();
        return view('categories.index', compact('feedbacks'));
    }

    public function totalCustomer() {
        $totalGuest = Guest::count(); // Count total number of guests
        return view('categories.admincit301_laraviel_suite', compact('totalGuest')); // Pass the totalGuest to the view
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
        $validatedData = $request->validate([
            'bookingId' => 'required|string|unique:guests,booking_id|max:50',
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'salutation' => 'nullable|string|max:50',
            'birthdate' => 'nullable|date',
            'gender' => 'nullable|string|max:10',
            'guestCount' => 'required|integer',
            'discountOption' => 'nullable|string',
            'email' => 'required|email',
            'contactNumber' => 'required|string|max:20',
            'address' => 'required|string',
            'checkIn' => 'required|date',
            'checkOut' => 'required|date',
            'bookedRooms' => 'required|string',
            'priceTotal' => 'required|numeric',
        ]);

        // Save the data into the database
        $guest = Guest::create([
            'booking_id' => $validatedData['bookingId'],
            'lastname' => $validatedData['lastname'],
            'firstname' => $validatedData['firstname'],
            'salutation' => $validatedData['salutation'],
            'birthdate' => $validatedData['birthdate'],
            'gender' => $validatedData['gender'],
            'guest_count' => $validatedData['guestCount'],
            'discount_option' => $validatedData['discountOption'],
            'email' => $validatedData['email'],
            'contact_number' => $validatedData['contactNumber'],
            'address' => $validatedData['address'],
            'check_in' => $validatedData['checkIn'],
            'check_out' => $validatedData['checkOut'],
            'booked_rooms' => $validatedData['bookedRooms'],
            'price_total' => $validatedData['priceTotal'],
        ]);

        session(['password' => $validatedData['bookingId']]);
        // Send the booking confirmation email using SendReceipt
        Mail::to($guest->email)->send(new SendReceipt($validatedData));

        return response()->json(['message' => 'Guest information submitted successfully and email sent!', 'data' => $guest], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guest = Guest::find($id);

        if ($guest) {
            $guest->delete();
            return redirect()->back()->with('success', 'Guest deleted successfully');
        }

        return redirect()->back()->with('error', 'Guest not found');
    }
}
