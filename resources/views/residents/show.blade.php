@extends('residents.layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Resident details</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Resident_id : {{ $residents->resident_id }}</h5>
        <p class="card-text">Name : {{ $residents->name }}</p>
        <p class="card-text">Email : {{ $residents->email }}</p>
  </div>
       
    </hr>
  
  </div>
</div>