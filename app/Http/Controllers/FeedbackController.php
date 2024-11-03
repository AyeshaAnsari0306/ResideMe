<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    // Display feedback submission form
    public function create()
    {
        return view('feedbacks.create');  // Create this view for feedback form
    }

    // Store feedback in the database
    public function store(Request $request)
    {
        // Validate the feedback data
        $request->validate([
            'message' => 'required|string|max:500',
        ]);

        // Get the authenticated user’s login_id and email
        $user = Auth::user();

        // Create the feedback
        Feedback::create([
            'login_id' => $user->login_id,
            'email' => $user->email,
            'message' => $request->input('message'),
        ]);

        // Redirect to home with success message
        return redirect()->route('home')->with('success', 'Feedback submitted successfully!');
    }
}
