<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\IncomeTrackerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ServiceController;
use App\Models\AvailedService;
use Illuminate\Support\Facades\Route;
use App\Models\Room;
use App\Models\Guest;
use App\Models\Feedback;
use App\Models\IncomeTracker;
use Illuminate\Http\Request;


Route::get('/', function () {
    $feedbacks = Feedback::latest()->take(10)->get();
    return view('categories.index', compact('feedbacks'));
})->name('landing');

// Define routes for your views
Route::view('/accommodation', 'categories.accommodation');
Route::view('/offers', 'categories.offers')->name('offers');
Route::view('/about', 'categories.about');
Route::view('/book-now', 'categories.book-now');

Route::view('/privacy-policy', 'categories.privacy-policy');
Route::get('/view-booking', [BookingController::class, 'showBooking'])->name('view-booking');
Route::post('/add-income', [IncomeTrackerController::class, 'addincome'])->name('add-income');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
// Route for rooms
Route::get('/rooms', [RoomController::class, 'index']);
Route::post('/submit-guest-info', [GuestController::class, 'store']);

Route::post('/services/submit', [ServiceController::class, 'submit'])->name('services.submit');

Route::delete('/guest/{id}', [GuestController::class, 'destroy'])->name('guest.destroy');
Route::delete('/room/{id}', [RoomController::class, 'destroy'])->name('room.destroy');

Route::post('/mark-as-paid/{id}', [ServiceController::class, 'markAsPaid'])->name('mark.as.paid');
Route::delete('/service/{service_id}', [ServiceController::class, 'destroy'])->name('service.destroy');

Route::put('/guests/{id}', [GuestController::class, 'update'])->name('guest.update');
Route::delete('/guest/{id}', [GuestController::class, 'destroy'])->name('guest.destroy');

Route::get('/room/{id}/edit', [RoomController::class, 'edit'])->name('room.edit');
Route::put('/room/{id}', [RoomController::class, 'update'])->name('room.update');
Route::post('/rooms', [RoomController::class, 'store'])->name('room.store');


// Admin-specific routes
Route::get('/admin', function(Request $request) {
    $rooms = Room::all();
    $guests = Guest::paginate(10);
    $totalRooms = Room::count();
    $totalGuests = Guest::count();

    $search = $request->input('search');

    // Query guests with optional search filter
    $guests = Guest::when($search, function ($query, $search) {
        return $query->where('lastname', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%")
                     ->orWhere('booking_id', 'like', "%{$search}%");
    })->paginate(10);

    $totalGuestPayments = IncomeTracker::sum('price');
    $incomeTracker = IncomeTracker::paginate(10);
    return view('categories.admincit301_laraviel_suite', compact('rooms', 'guests', 'totalRooms', 'totalGuests', 'totalGuestPayments', 'incomeTracker'));
})->middleware(['auth', 'verified', 'roletype:admin'])->name('admin');

Route::get('/cashier', function() {
    $availed_services = AvailedService::all();
    return view('categories.cashier', compact('availed_services'));
})->middleware(['auth', 'verified', 'roletype:cashier'])->name('cashier');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';