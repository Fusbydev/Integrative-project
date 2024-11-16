<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\IncomeTrackerController;
use Illuminate\Support\Facades\Route;
use App\Models\Room;
use App\Models\Guest;
use App\Models\IncomeTracker;

Route::get('/', function () {
    return view('categories.index');
});

// Define routes for your views
Route::view('/accommodation', 'categories.accommodation');
Route::view('/home', 'categories.index');
Route::view('/offers', 'categories.offers');
Route::view('/about', 'categories.about');
Route::view('/book-now', 'categories.book-now');

Route::view('/privacy-policy', 'categories.privacy-policy');
Route::get('/view-booking', [BookingController::class, 'showBooking']);
Route::post('/add-income', [IncomeTrackerController::class, 'addincome']);
// Route for rooms
Route::get('/rooms', [RoomController::class, 'index']);
Route::post('/submit-guest-info', [GuestController::class, 'store']);


Route::delete('/guest/{id}', [GuestController::class, 'destroy'])->name('guest.destroy');
Route::delete('/room/{id}', [RoomController::class, 'destroy'])->name('room.destroy');

Route::get('/admincit301_laraviel_suite', function() {
    $rooms = Room::all();
    $guests = Guest::all(); // If you also need guest data
    $totalRooms = Room::count(); // Get total number of rooms
    $totalGuests = Guest::count(); // Get total number of guests
    $totalGuestPayments = IncomeTracker::sum('price');
    $incomeTracker = IncomeTracker::all();
    return view('categories.admincit301_laraviel_suite', compact('rooms', 'guests', 'totalRooms', 'totalGuests', 'totalGuestPayments', 'incomeTracker'));
});

