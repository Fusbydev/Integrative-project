<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id', // New field for unique identifier
        'lastname', 'firstname', 'salutation', 'birthdate', 'gender',
        'guest_count', 'discount_option', 'email', 'contact_number',
        'address', 'check_in', 'check_out', 'booked_rooms', 'price_total'
    ];
    
}
