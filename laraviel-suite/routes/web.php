<?php

use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('categories.index');
});

// Define routes for your views
Route::view('/accommodation', 'categories.accommodation');
Route::view('/home', 'categories.index');
Route::view('/offers', 'categories.offers');
Route::view('/about', 'categories.about');
Route::view('/book-now', 'categories.book-now');
Route::view('/admincit301_laraviel_suite', 'categories.admincit301_laraviel_suite');
Route::view('/privacy-policy', 'categories.privacy-policy');

// Route for rooms
Route::get('/rooms', [RoomController::class, 'index']);
Route::post('/submit-guest-info', [GuestController::class, 'store']);

// Add routes for your sidebar sections
Route::get('/dashboard', function () {
    return view('dashboard.index'); // Adjust view as necessary
});

Route::get('/customers', function () {
    return view('customers.index'); // Adjust view as necessary
});

Route::get('/rooms/calendar', function () {
    return view('rooms.calendar'); // Adjust view as necessary
});

Route::get('/rooms/management', function () {
    return view('rooms.management'); // Adjust view as necessary
});

Route::get('/income-tracker', function () {
    return view('income-tracker.index'); // Adjust view as necessary
});
