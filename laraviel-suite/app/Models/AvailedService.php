<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvailedService extends Model
{
    use HasFactory;
    // Specify which attributes can be mass-assigned
    protected $fillable = [
        'booking_id',
        'guest_name',
        'service_id',
        'service_date',
        'payment_method',
        'payment_status',
        'total_price',
    ];

    // Optionally, if you have timestamps, define them
    public $timestamps = true;
    public function service()
{
    return $this->belongsTo(Service::class, 'service_id', 'service_id'); // Map 'service_id' in availed_services to 'id' in services
}

}
