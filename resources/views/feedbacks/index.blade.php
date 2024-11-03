@extends('layouts.admin-app')
@section('content')
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
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
    <h1>Feedbacks</h1>

    <!-- Flash message for success/failure -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Login ID</th>
                <th>Email</th>
                <th>Message</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedbacks as $feedback)
            <tr>
                <td>{{ $feedback->login_id }}</td>
                <td>{{ $feedback->email }}</td>
                <td>{{ $feedback->message }}</td>
                <td>{{ ucfirst($feedback->status) }}</td>
                <td>
                    <!-- Form for changing status -->
                    <form action="{{ route('admin.feedback.updateStatus', $feedback->id) }}" method="POST">
                        @csrf
                        <!-- Dropdown to select status -->
                        <div class="form-group">
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="pending" {{ $feedback->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="reviewed" {{ $feedback->status == 'reviewed' ? 'selected' : '' }}>Reviewed</option>
                                <option value="resolved" {{ $feedback->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                            </select>
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
