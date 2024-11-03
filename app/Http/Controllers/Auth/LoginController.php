<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;  
use App\Models\User;   
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {
        // Validate the login credentials
        $request->validate([
            'login_id' => 'required', // Ensure this matches your form
        ]);
    
        // Check if the user exists with the given login ID
        $user = User::where('login_id', $request->login_id)->first();
    
        if ($user) {
            // Log the user in
            Auth::login($user);
    
            // Redirect to the intended dashboard page
            return redirect()->intended('home');
        } else {
            // Return an error if the user is not found
            return back()->withErrors([
                'login_id' => 'These credentials do not match our records.',
            ]);
        }
    }
    
    
    public function __construct()
    {
    
    //$this->middleware('guest')->except('logout');
    $this->middleware('guest',['except'=>['logout','userLogout']]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login');  // Redirect to the login page after logout
    }
    
    protected function authenticated(Request $request, $user)
{
    if ($user->role == 'admin') {
        return redirect()->route('admin.dashboard');
    } else if ($user->role == 'resident') {
        return redirect()->route('residents.index'); // Replace with appropriate route
    }
}

}
