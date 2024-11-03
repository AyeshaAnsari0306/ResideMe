<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ResidentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeedbackController;

// Home page route
Route::get('/', function () {
    return view('welcome');
});

// User authenticated routes
Route::middleware(['auth'])->group(function () {
    // Home route
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Auth::routes();
    // Feedback form route
    Route::get('/feedback/create', [FeedbackController::class, 'create'])->name('feedback.create');
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

    // Logout route
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Login route
Route::post('/login', [LoginController::class, 'login'])->name('login');


// Room CRUD routes (accessible to admins)
Route::middleware(['admin.auth'])->group(function () {
    Route::resource('/room', RoomController::class);  // Room CRUD for admins
});

// Resident CRUD routes (accessible to authenticated residents)
Route::middleware(['auth', 'role:resident'])->group(function () {
    Route::resource('/resident', ResidentController::class);
    Route::match(['GET', 'POST'], '/user/logout', [App\Http\Controllers\Auth\LoginController::class, 'userLogout'])->name('user.logout');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    // Guest admin routes
    Route::middleware('admin.guest')->group(function () {
        Route::view('/login', 'admin.login')->name('admin.login');
        Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.auth');
    });

    // Authenticated admin routes
    Route::middleware('admin.auth')->group(function () {
        // Admin dashboard route with statistics (total residents and rooms)
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Resident and room management by admin
        Route::resource('/resident', ResidentController::class, ['as' => 'admin']);
        Route::resource('/room', RoomController::class, ['as' => 'admin']);

        // Admin feedback management routes
        Route::get('/feedback', [AdminController::class, 'feedbackIndex'])->name('admin.feedback.index');
        Route::post('/feedback/{feedback}/status', [AdminController::class, 'updateFeedbackStatus'])->name('admin.feedback.updateStatus');

        // Admin logout
        Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    });
});
Route::get('/rooms', function () {
    $rooms = \App\Models\Room::where('is_available', true)->get();
    return view('user.rooms', compact('rooms'));
})->name('user.rooms');
Route::get('/contact', function () {
    return view('user.contact');
})->name('user.contact');
