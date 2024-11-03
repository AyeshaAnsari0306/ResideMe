@extends('residents.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">
      
      <form action="{{ url('admin/resident/') }}" method="post">
        {!! csrf_field() !!}
        {{--<label>Resident_id</label></br>
        <input type="text" name="resident_id" id="resident_id" class="form-control"></br>--}}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Email</label></br>
        <input type="text" name="email" id="email" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop