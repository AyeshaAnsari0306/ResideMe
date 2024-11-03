@extends('rooms.layout')

@section('content')
<div class="card">
    <div class="card-header">Edit Room</div>
    <div class="card-body">
        <form action="{{ url('room/' .$rooms->id) }}" method="post">
            {!! csrf_field() !!}
            @method("PATCH")

            <label>Room Number</label></br>
            <input type="text" name="room_number" id="room_number" value="{{ old('room_number', $rooms->room_number) }}" class="form-control"></br>

            <label>Room Type</label></br>
            <input type="text" name="room_type" id="room_type" value="{{ old('room_type', $rooms->room_type) }}" class="form-control"></br>

            <label>Capacity</label></br>
            <input type="number" name="capacity" id="capacity" value="{{ old('capacity', $rooms->capacity) }}" class="form-control"></br>

            <label>Price Per Semester</label></br>
            <input type="number" name="price_per_semester" id="price_per_semester" value="{{ old('price_per_semester', $rooms->price_per_semester) }}" class="form-control"></br>

            <label>Is Available</label></br>
            <input type="checkbox" name="is_available" id="is_available" class="form-check-input" value="1" {{ old('is_available', $rooms->is_available) ? 'checked' : '' }}>

            <label>Amenities</label></br>
            <textarea name="amenities" id="amenities" class="form-control">{{ old('amenities', $rooms->amenities) }}</textarea></br>

            <input type="submit" value="Update" class="btn btn-success"></br>
        </form>
    </div>
</div>
@stop
