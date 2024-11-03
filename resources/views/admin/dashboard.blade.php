@extends('layouts.admin-app')

@section('content')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">ResideMe</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.resident.index') }}">Manage Residents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.room.index') }}">Manage Rooms</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.feedback.index') }}">View Feedbacks</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Main content section -->
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Options for Resident, Room, and Feedback Management -->
                    <div class="mt-4">
                        <a href="{{ route('admin.resident.index') }}" class="btn btn-primary">Manage Residents</a>
                        <a href="{{ route('admin.room.index') }}" class="btn btn-secondary">Manage Rooms</a>
                        <a href="{{ route('admin.feedback.index') }}" class="btn btn-primary">View Feedbacks</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row mt-4">
        <!-- Statistics Card for Total Residents -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Total Residents</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalResidents }}</h5>
                    <p class="card-text">Number of residents currently registered.</p>
                </div>
            </div>
        </div>

        <!-- Statistics Card for Total Rooms -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Total Rooms</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $totalRooms }}</h5>
                    <p class="card-text">Number of rooms available in the system.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
