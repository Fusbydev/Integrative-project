<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- booking-details.blade.php -->
<h1>Booking Details</h1>
<ul>
    <li><strong>Booking ID:</strong> {{ $guest->booking_id}}</li>
    <li><strong>Guest Name:</strong> {{ $guest->firstname }}</li>
    <li><strong>Check-in Date:</strong> {{ $guest->check_in}}</li>
    <li><strong>Check-out Date:</strong> {{ $guest->check_out}}</li>
    <!-- Add other booking details as needed -->
</ul>
</body>
</html>