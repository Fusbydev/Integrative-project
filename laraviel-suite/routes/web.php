<?php
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('categories.index');
});

// Define a route to fetch all rooms



Route::view('/accommodation', 'categories.accommodation');
Route::view('/home', 'categories.index');
Route::view('/offers', 'categories.offers');
Route::view('/about', 'categories.about');
Route::view('/book-now', 'categories.book-now');
Route::view('/admincit301_laraviel_suite', 'categories.admincit301_laraviel_suite');
Route::get('/rooms', [RoomController::class, 'index']);

Route::view('/privacy-policy', 'categories.privacy-policy');

Route::post('/submit-guest-info', [GuestController::class, 'store']);



