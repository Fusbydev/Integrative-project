<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms'; // Specify the table name if it's not the plural form of the model

    protected $fillable = [
        'room_type', // Ensure this matches your migration column
        'description',
        'price',
        'image_path',
    ];
}


