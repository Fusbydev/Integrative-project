<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $rooms = Room::all(); // Fetch all rooms
            return response()->json($rooms); // Return as JSON
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function adminRoom() {
            $rooms = Room::all(); // Fetch all room records
            return view('categories.admincit301_laraviel_suite', ['rooms' => $rooms]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'room_type' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $roomImageName = 'room_' . time() . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path('images/roomImage'), $roomImageName);
            $imagePath = './images/roomImage/' . $roomImageName;
        }

        // Create a new room
        Room::create([
            'room_type' => $request->room_type,
            'price' => $request->price,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('admin')->with('success', 'Room added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $room = Room::findOrFail($id);
    return view('rooms.edit', compact('room'));
}

public function update(Request $request, $id)
{
    // Validate the input
    $validatedData = $request->validate([
        'room_type' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Validate image
    ]);

    // Find the room by ID
    $room = Room::findOrFail($id);

    // Update room data
    $room->room_type = $validatedData['room_type'] . ' Room';
    $room->description = $validatedData['description'];
    $room->price = $validatedData['price'];

    // Check if an image is uploaded
    if ($request->hasFile('image')) {
        // Generate a unique name for the image, including the room ID
        $roomImageName = 'room_' .time(). '.' . $request->file('image')->extension();
        echo $roomImageName;
        // Move the uploaded image to the 'public/images' folder
        $request->file('image')->move(public_path('images/roomImage'), $roomImageName);

        // Get the path to the uploaded image
        $imagePath = './images/roomImage/' . $roomImageName;

        // Update the room's image path
        $room->image_path = $imagePath;
    }

    // Save the updated room data
    $room->save();

    return redirect()->route('admin')->with('success', 'Room updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::find($id);

        if ($room) {
            $room->delete();
            return redirect()->back()->with('success', 'room deleted successfully');
        }

        return redirect()->back()->with('error', 'room not found');
    }
}
