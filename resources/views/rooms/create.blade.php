@extends('rooms.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('room') }}" method="post">
        {!! csrf_field() !!}
        <label>Room Number</label></br>
        <input type="text" name="room_number" id="room_number" class="form-control"></br>

        <label>Room Type</label></br>
        <select name="room_type" id="room_type" class="form-control">
        <option value="single">Single</option>
        <option value="double">Double</option>
        <option value="suite">Suite</option>
        <option value="shared">Shared</option>
        </select></br>

        <label>Capacity</label></br>
        <input type="number" name="capacity" id="capacity" class="form-control"></br>

        <label>Price Per Semester</label></br>
        <input type="number" name="price_per_semester" id="price_per_semester" class="form-control"></br>

        <label>Is Available</label></br>
        <input type="checkbox" name="is_available" id="is_available" class="form-check-input" @if(old('is_available')) checked @endif>

        <!--<input type="checkbox" name="is_available" id="is_available" class="form-check-input"></br>-->

        <label>Amenities</label></br>
        <textarea name="amenities" id="amenities" class="form-control"></textarea></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop