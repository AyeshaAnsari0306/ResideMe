@extends('rooms.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Room Number: {{ $rooms->room_number }}</h5>
        <p class="card-text">Room Type: {{ $rooms->room_type }}</p>
        <p class="card-text">Capacity: {{ $rooms->capacity }}</p>
        <p class="card-text">Price Per Semester: {{ $rooms->price_per_semester }}</p>
        <p class="card-text">Is Available: {{ $rooms->is_available ? 'Yes' : 'No' }}</p>
        <p class="card-text">Amenities: {{ $rooms->amenities }}</p>
  </div>
       
    </hr>
  
  </div>
</div>