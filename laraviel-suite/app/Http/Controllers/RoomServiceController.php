<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class RoomServiceController extends Controller
{

    public function createRoomService(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'service_name' => 'required|string|max:255',
            'availed_service' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0'
        ]);

        // Insert data into the database
        Service::create([
            'service_name' => $validatedData['service_name'],
            'availed_service' => $validatedData['availed_service'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price']
        ]);

        return redirect()->back()->with('approved', 'Room Service created successfully.');
    }
}


