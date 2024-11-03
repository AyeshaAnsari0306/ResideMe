@extends('residents.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('admin/resident/' .$residents->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$residents->id}}" id="id" />
        <label>Resident_id</label></br>
        <input type="text" name="resident_id" id="resident_id" value="{{$residents->resident_id}}" class="form-control"></br>
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$residents->name}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" value="{{$residents->email}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop