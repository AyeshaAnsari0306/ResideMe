<?php

namespace App\Http\Controllers;
use App\Models\Resident;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class ResidentController extends Controller
{
  
    public function index()
    {
        $residents = Resident::all();
      return view ('residents.index')->with('residents', $residents);
    }

    
    public function create()
    {
        return view('residents.create');
    }
    public function store(Request $request)
{
    DB::beginTransaction();

    try {
        // Create the resident
        $resident = Resident::create([
            'name' => $request->name,
            'email' => $request->email,
            'resident_id' => $this->generateUniqueResidentId(),
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'login_id' => $resident->resident_id,  // Assign the resident ID to login_id
            'password' => bcrypt('password'),  // You can set a default password here
        ]);

        DB::commit();

        return redirect()->route('admin.resident.index')->with('success', 'Resident created successfully.');
    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('Error creating resident and user: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to create resident.');
    }
}
  
    // Function to generate a unique resident ID (you can modify this based on your logic)
    private function generateUniqueResidentId()
    {
        return strtoupper(substr(uniqid(), 0, 8)); // Generate a random unique ID
    }
    
    public function show($id)
    {
        $resident = Resident::find($id);
        return view('residents.show')->with('residents', $resident);
    }

    
    public function edit($id)
    {
        $resident = Resident::find($id);
        return view('residents.edit')->with('residents', $resident);
    }

  
    public function update(Request $request, $id)
    {
        $resident = Resident::find($id);
        $input = $request->all();
        $resident->update($input);
        return redirect('admin/resident')->with('flash_message', 'Resident Updated!');  
    }

   
    public function destroy($id)
    {
        Resident::destroy($id);
        return redirect('admin/resident')->with('flash_message', 'Resident deleted!');  
    }
}