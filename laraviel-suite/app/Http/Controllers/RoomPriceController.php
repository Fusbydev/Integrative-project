<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class RoomPriceController extends Controller
{
    public function getRoomPrices()
{
    $roomPrices = DB::table('room_prices')->select('id', 'room_type', 'price')->get();
    return response()->json($roomPrices);
}

}
