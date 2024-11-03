<?php

namespace App\Http\Controllers;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
  
    public function index()
    {
        $rooms = Room::all();
      return view ('rooms.index')->with('rooms', $rooms);
    }

    
    public function create()
    {
        return view('rooms.create');
    }

   
    public function store(Request $request)
    {
        // Validate the input, including room_type as a dropdown with specific options
        $request->validate([
            'room_number' => 'required|string|unique:rooms,room_number',
            'room_type' => 'required|in:single,double,suite,shared', // Validate room_type field
            'capacity' => 'required|integer|min:1',
            'price_per_semester' => 'required|numeric|min:0',
            'is_available' => 'boolean',
            'amenities' => 'nullable|string'
        ]);
    
        // Get all the validated data
        $input = $request->all();
    
        // Create a new Room with the validated data
        Room::create($input);
    
        // Redirect back to the room list with a success message
        return redirect('room')->with('flash_message', 'Room Added!');
    }
    

    
    public function show($id)
    {
        $room = Room::find($id);
        return view('rooms.show')->with('rooms', $room);
    }

    
    public function edit($id)
    {
        $room = Room::find($id);
        return view('rooms.edit')->with('rooms', $room);
    }

  
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'room_number' => 'required|string|max:255',
            'room_type' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'price_per_semester' => 'required|numeric',
            'is_available' => 'nullable|boolean', // 'nullable' allows for unchecked checkbox
            'amenities' => 'nullable|string',
        ]);
    
        // Find the room by ID
        $room = Room::findOrFail($id);
    
        // Update the room with the validated data
        $room->update([
            'room_number' => $request->input('room_number'),
            'room_type' => $request->input('room_type'),
            'capacity' => $request->input('capacity'),
            'price_per_semester' => $request->input('price_per_semester'),
            'is_available' => $request->has('is_available') ? true : false, // Correctly handle checkbox state
            'amenities' => $request->input('amenities'),
        ]);
    
        // Redirect back with a success message
        return redirect('room')->with('flash_message', 'Room updated successfully');
    }
    

    public function destroy($id)
    {
        Room::destroy($id);
        return redirect('room')->with('flash_message', 'Room deleted!');  
    }
}