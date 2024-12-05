<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms'; // Specify the table name if it's not the plural form of the model

    protected $fillable = [
        'room_type',  // Ensure this matches your migration column
        'description',
        'image_path',
        'room_price_id',  // Use the foreign key to reference the price in the RoomPrices table
    ];

    // Define the relationship with the RoomPrices model
    public function price()
    {
        return $this->belongsTo(RoomPrices::class, 'room_price_id');
    }
}
