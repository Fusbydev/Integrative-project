<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Details</title>
    <link rel="stylesheet" href="/css/viewb.css">
</head>
<body>
    <div class="container">
        <div class="booking-details">
            <h2> Details</h2>
            <hr style="border-color: #BFA75D;">
            <ul>
                <li class="highlight-text"><strong>Room Type:</strong> {{ $guest -> booked_rooms }} </li>
                <li class="highlight-text"><strong>Booking Reference Number: </strong>{{$guest -> booking_id}}</li>
                <li class="highlight-text"><strong>Guest Name:</strong> {{ $guest->firstname }} {{ $guest->lastname }}</li>
                <li class="highlight-text"><strong>Check-in:</strong> {{ $guest -> check_in }} </li>
                <li class="highlight-text"><strong>Check-out:</strong> {{ $guest -> check_out }}</li>
            </ul>
        </div>
        
        @php
            $checkInDate = \Carbon\Carbon::parse($guest->check_in);
            $checkOutDate = \Carbon\Carbon::parse($guest->check_out);
            $totalDays = $checkInDate->diffInDays($checkOutDate);
            $daysStayed = floor($checkInDate->diffInDays(now()));
            $remainingDays = max(0, $totalDays - $daysStayed);
        @endphp

        <div class="stay-progress">
            <h2>Stay Progress</h2>
            <ul>
                <li class="highlight-text"><strong>Days Stayed:</strong> {{ $daysStayed }}</li>
                <li class="highlight-text"><strong>Stay Status:</strong> {{ $checkOutDate > now() ? 'Ongoing' : 'Completed' }}</li>
                <li class="highlight-text"><strong>Remaining Days:</strong> {{ floor($remainingDays) }}</li>
            </ul>
        </div>
        <div class="billing-payment">
            <h2>Billing and Payment</h2>
            <ul>
                <li class="highlight-text"><strong>Total Cost:</strong> Php {{ number_format($guest->price_total, 2) }}</li>
                <li class="highlight-text"><strong>Paid Amount:</strong> Php {{ number_format($guest->price_total, 2) }}</li>
            </ul>        
        </div>
        <hr style="border-color: #BFA75D;">
        <div class="stay-experience">
            <form action="{{ route('feedback.store') }}" method="POST">
                @csrf
                <h2>Stay Experience</h2>
                <p>Your feedback is valuable to us! Please share your thoughts and suggestions to help improve your experience with Laraveil Suites.</p>
                <textarea name="feedback" placeholder="Describe your experience..." style="color: white; font-size: 15px;"></textarea>

                <div>
                    <div style="display: flex; justify-content: center; margin-bottom: 20px;">
                        <input type="radio" name="anonymous" value="1" id="submit-anonymous" checked>
                        <label for="submit-anonymous" class="radio-label">Submit Anonymously</label>
                        
                        <input type="radio" name="anonymous" value="0" id="show-my-name">
                        <label for="show-my-name" class="radio-label">Show My Name</label>
                    </div>
                </div>

                <div class="rating">
                    <h2 class="rating-title">Rate your experience!</h2>
                    <div class="stars">
                        <input type="radio" name="rating" value="1" id="star1"><label for="star1" class="star-label">&#9733;</label>
                        <input type="radio" name="rating" value="2" id="star2"><label for="star2" class="star-label">&#9733;</label>
                        <input type="radio" name="rating" value="3" id="star3"><label for="star3" class="star-label">&#9733;</label>
                        <input type="radio" name="rating" value="4" id="star4"><label for="star4" class="star-label">&#9733;</label>
                        <input type="radio" name="rating" value="5" id="star5"><label for="star5" class="star-label">&#9733;</label>
                    </div>
                </div>

                <input type="hidden" name="guest_id" value="{{ $guest->id }}">
                <button type="submit" class="Submit">Submit</button>
            </form>
        </div>
    </div>
    <script>
        const stars = document.querySelectorAll('.rating input');
        stars.forEach(star => {
            star.addEventListener('change', () => {
                const ratingValue = star.id.replace('star', '');
                alert(`You rated ${ratingValue} stars`);
            });
        });
   </script>
</body>
</html>