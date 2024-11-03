@extends('rooms.layout')

@section('content')
<!-- Full-width Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light w-100">
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

<!-- Main Content Area -->
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Rooms</div>
                <div class="card-body">
                    <a href="{{ url('/room/create') }}" class="btn btn-success btn-sm" title="Add New Room">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br/><br/>

                    @if (session('flash_message'))
                        <div class="alert alert-success">
                            {{ session('flash_message') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Room Number</th>
                                    <th>Room Type</th>
                                    <th>Capacity</th>
                                    <th>Price Per Semester</th>
                                    <th>Is Available</th>
                                    <th>Amenities</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->room_number }}</td>
                                        <td>{{ $item->room_type }}</td>
                                        <td>{{ $item->capacity }}</td>
                                        <td>{{ $item->price_per_semester }}</td>
                                        <td>{{ $item->is_available ? 'Yes' : 'No' }}</td>
                                        <td>{{ $item->amenities }}</td>
                                        <td>
                                            <a href="{{ url('/room/' . $item->id) }}" title="View Room">
                                                <button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
                                            </a>
                                            <a href="{{ url('/room/' . $item->id . '/edit') }}" title="Edit Room">
                                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                                            </a>
                                            <form method="POST" action="{{ url('/room/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Room" onclick="return confirm('Confirm delete?')">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
