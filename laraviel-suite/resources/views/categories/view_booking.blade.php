<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet" href="/css/viewb.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-dark text-white">

    <div class="container mt-5">
        <!-- Booking Details -->
        <div class="booking-details mb-5">
            <h2 class="text-center text-warning">Booking Details</h2>
            <hr style="border-color: #BFA75D;">
            <ul class="list-unstyled">
                <li><strong>Room Type:</strong> {{ $guest->booked_rooms }}</li>
                <li><strong>Booking Reference Number:</strong> {{ $guest->booking_id }}</li>
                <li><strong>Guest Name:</strong> {{ $guest->firstname }} {{ $guest->lastname }}</li>
                <li><strong>Check-in:</strong> {{ $guest->check_in }}</li>
                <li><strong>Check-out:</strong> {{ $guest->check_out }}</li>
            </ul>
        </div>

        <!-- Stay Progress -->
        @php
        $checkInDate = \Carbon\Carbon::parse($guest->check_in);
        $checkOutDate = \Carbon\Carbon::parse($guest->check_out);
        $totalDays = $checkInDate->diffInDays($checkOutDate);
        $daysStayed = floor($checkInDate->diffInDays(now()));
        $remainingDays = max(0, $totalDays - $daysStayed);
        @endphp

        <div class="stay-progress mb-5">
            <h2 class="text-center text-warning">Stay Progress</h2>
            <hr style="border-color: #BFA75D;">
            <ul class="list-unstyled">
                <li><strong>Days Stayed:</strong> {{ $daysStayed }}</li>
                <li><strong>Stay Status:</strong> {{ $checkOutDate > now() ? 'Ongoing' : 'Completed' }}</li>
                <li><strong>Remaining Days:</strong> {{ $remainingDays }}</li>
            </ul>
        </div>

        <!-- Billing and Payment -->
        <div class="billing-payment mb-5">
            <h2 class="text-center text-warning">Billing and Payment</h2>
            <hr style="border-color: #BFA75D;">
            <ul class="list-unstyled">
                <li><strong>Total Cost:</strong> Php {{ number_format($guest->price_total, 2) }}</li>
                <li><strong>Paid Amount:</strong> Php {{ number_format($guest->price_total, 2) }}</li>
            </ul>
        </div>

        <!-- Service Feedback Section -->

        <div class="services mb-5">
            <h2 class="text-center text-warning">Avail Our Services for a Better Experience</h2>
            @if(auth()->user()->role == 'guest')
            <form action="{{ route('services.submit') }}" method="POST" class="container mt-5">
                @csrf
                <h2 class="mb-4 text-white">Select Service</h2>

                <!-- Hidden field for booking ID -->
                <input type="hidden" name="booking_id" value="{{ $guest->booking_id }}">
                <!-- Hidden field for guest name -->
                <input type="hidden" name="name" value="{{ $guest->firstname }} {{ $guest->lastname }}">

                <!-- Dropdown for services -->
                <div class="mb-3">
                    <label for="service" class="form-label">Available Services:</label>
                    <select name="service_id" id="service" class="form-select" aria-label="Select a service" required>
                        <option value="" disabled selected>Select a service</option>
                        @foreach($services as $service)
                        <option value="{{ $service->service_id }}" data-price="{{ $service->price }}">
                            {{ $service->service_name }} - Php {{ number_format($service->price, 2) }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Service Date -->
                <div class="mb-3">
                    <label for="service_date" class="form-label">Service Date:</label>
                    <input type="date" name="service_date" id="service_date" class="form-control" required>
                </div>

                <!-- Payment Method (Over the Counter or Online Payment) -->
                <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method:</label>
                    <select name="payment_method" id="payment_method" class="form-select" required>
                        <option value="over_the_counter">Over the Counter</option>
                        <option value="online_payment">Online Payment</option>
                    </select>
                </div>

                <!-- Total Price -->
                <div class="mb-3">
                    <label for="total_price" class="form-label">Total Price (Php):</label>
                    <input type="number" name="total_price" id="total_price" class="form-control" required readonly>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            @else
            <p class="text-center">change to guest</p>
            @endif


            <div class="container">
                <h2 class="text-warning">Availed Services</h2>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Service Name</th>
                            <th>Service Date</th>
                            <th>Payment Method</th>
                            <th>Total Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
            <tbody>
                @forelse ($guest->services as $service)
                    <tr>
                        <td>{{ $service->service->service_name ?? 'Service not found' }}</td>
                        <td>{{ $service->service_date }}</td>
                        <td class="text-center">
                                    <p class="{{ $service->payment_status == 'pending' ? 'bg-warning text-white' : 'bg-success text-white' }} p-2 rounded-pill">
                                        {{ $service->payment_status }}
                                    </p>
                                </td>
                        <td>Php {{ number_format($service->total_price, 2) }}</td>
                        <td>
                            <form action="{{ route('service.destroy', $service->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Cancel</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No services availed.</td>
                    </tr>
                @endforelse
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Stay Experience Feedback Form -->
        <div class="stay-experience mb-5">
            <h2 class="text-center text-warning">Stay Experience</h2>
            <p class="text-center">Your feedback is valuable to us! Please share your thoughts and suggestions to help improve your experience with Laraveil Suites.</p>

            <form action="{{ route('feedback.store') }}" method="POST" class="mb-4">
                @csrf
                <div class="mb-3">
                    <textarea name="feedback" class="form-control" rows="5" placeholder="Describe your experience..."></textarea>
                </div>

                <div class="d-flex justify-content-center mb-4">
                    <div class="form-check me-4">
                        <input type="radio" name="anonymous" value="1" id="submit-anonymous" checked class="form-check-input">
                        <label for="submit-anonymous" class="form-check-label">Submit Anonymously</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="anonymous" value="0" id="show-my-name" class="form-check-input">
                        <label for="show-my-name" class="form-check-label">Show My Name</label>
                    </div>
                </div>

                <div class="rating">
            <h2 class="rating-title">Rate your experience!</h2>
            <div class="stars">
                <input type="radio" name="rating" value="5" id="star5">
                <label for="star5" class="star-label">&#9733;</label>

                <input type="radio" name="rating" value="4" id="star4">
                <label for="star4" class="star-label">&#9733;</label>

                <input type="radio" name="rating" value="3" id="star3">
                <label for="star3" class="star-label">&#9733;</label>

                <input type="radio" name="rating" value="2" id="star2">
                <label for="star2" class="star-label">&#9733;</label>

                <input type="radio" name="rating" value="1" id="star1">
                <label for="star1" class="star-label">&#9733;</label>
            </div>
        </div>
                <input type="hidden" name="guest_id" value="{{ $guest->id }}">
                <button type="submit" class="btn btn-success w-100">Submit</button>
            </form>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
    @csrf
    <button type="submit" class="nav-link btn btn-link p-2" style="color: red; text-decoration: none; border: solid red 1px;">
      <i class="bi bi-box-arrow-right"></i> Logout
    </button>
  </form>
        </div>
    </div>

    <script>
        const stars = document.querySelectorAll('.rating input');
        stars.forEach(star => {
            star.addEventListener('change', () => {
                const ratingValue = star.id.replace('star', '');
            });
        });

        document.getElementById("service_date").value = new Date().toISOString().split('T')[0];

        // Get the service select element
        const serviceSelect = document.getElementById('service');

        // Get the total price input field
        const totalPriceInput = document.getElementById('total_price');

        // Update total price when a service is selected
        serviceSelect.addEventListener('change', function() {
            // Get the selected option's data-price attribute
            const selectedOption = serviceSelect.options[serviceSelect.selectedIndex];
            const price = selectedOption.getAttribute('data-price');

            // Set the total price field with the service price
            totalPriceInput.value = price;
        });
    </script>

</body>

</html>