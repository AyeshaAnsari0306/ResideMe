<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Resident;
use App\Models\Room;
use App\Models\Feedback;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function authenticate(Request $request)
    {
        // Validate input data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Check if the admin is authenticated
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            // Redirect to admin dashboard on success
            return redirect()->route('admin.dashboard');
        } else {
            // Return an error message if authentication fails
            session()->flash('error', 'Either email or password is incorrect');
            return back()->withInput($request->only('email'));
        }
    }

    public function store(Request $request)
{
    // Validate request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        // any other required fields
    ]);

    // Generate Unique ID for the resident
    $resident_id = $this->generateUserFriendlyUniqueId();

    // Save to the residents table
    $resident = Resident::create([
        'name' => $validatedData['name'],
        'resident_id' => $resident_id,
        // other fields for the resident table
    ]);

    // Save to the users table for login purposes
    User::create([
        'name' => $validatedData['name'],  // The same name
        'login_id' => $resident_id,  // Save the resident ID as login ID in the users table
        'password' => bcrypt(Str::random(8)),  // You can generate a random password
        // any other required fields for the users table
    ]);

    return redirect()->route('admin.dashboard')->with('success', 'Resident and User created successfully.');
}

   
    public function login(Request $request)
{
    // Validate the login credentials
    $request->validate([
        'name' => 'required',
        'login_id' => 'required',
    ]);

    // Check if the user exists with the given name and login ID
    $user = User::where('name', $request->name)
                ->where('login_id', $request->login_id)
                ->first();

    if ($user) {
        // Log the admin in using the admin guard
        Auth::guard('admin')->login($user);

        // Redirect to the intended admin dashboard page
        return redirect()->route('admin.dashboard');
    } else {
        // Return an error if the admin is not found
        return back()->withErrors([
            'login_id' => 'These credentials do not match our records.',
        ]);
    }
}


    public function logout()
    {
        // Log the admin out
        Auth::guard('admin')->logout();

        // Redirect back to the admin login page
        return redirect()->route('admin.login');
    }
    // Display all feedback for admin
    public function feedbackIndex()
    {
        $feedbacks = Feedback::all();  // Retrieve all feedback

        return view('feedbacks.index', compact('feedbacks'));
    }

    // Update feedback status
        public function updateFeedbackStatus(Request $request, $feedbackId)
{
    // Validate the status input
    $request->validate([
        'status' => 'required|in:pending,reviewed,resolved',
    ]);

    // Find the feedback by ID
    $feedback = Feedback::findOrFail($feedbackId);

    // Update the status
    $feedback->status = $request->input('status');
    $feedback->save();

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Feedback status updated successfully!');
}
public function dashboard()
{
    // Fetch total count of residents and rooms
    $totalResidents = Resident::count();
    $totalRooms = Room::count();

    // Pass the counts to the view
    return view('admin.dashboard', compact('totalResidents', 'totalRooms'));
}
}
