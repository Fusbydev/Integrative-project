<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation Receipt</title>
    <style>
        body {
            background-color: red;
        }
    </style>
</head>
<body>
    <h1>Dear {{ $guestData['salutation'] }} {{ $guestData['lastname'] }},</h1>
    <h3>Booking ID: {{ $guestData['bookingId'] }}</h3>
    <p>Save your booking ID for tracking your services!</p>
    <p>Thank you for your booking. Below are the details of your reservation:</p>

    <p><strong>Guest Name:</strong> {{ $guestData['lastname'] }}, {{ $guestData['firstname'] }}</p>
    <p><strong>Check-In Date:</strong> {{ $guestData['checkIn'] }}</p>
    <p><strong>Check-Out Date:</strong> {{ $guestData['checkOut'] }}</p>
    <p><strong>Booked Rooms:</strong> {{ $guestData['bookedRooms'] }}</p>
    <p><strong>Total Price:</strong> Php {{ $guestData['priceTotal'] }}</p>

    <p>If you have any questions, feel free to contact us. We look forward to your stay!</p>
</body>
</html>
