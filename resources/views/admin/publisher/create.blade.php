@extends ('layouts.admin')
@section('header' , 'Publisher')

@section('content')
  <section class="content">
<div class="container-fluid">
<class="row">

<div class="col-md-6">

<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Create New Publisher</h3>
</div>


<form action="{{url('publishers')}}" method="post" >
  @csrf
<div class="card-body">
<div class="form-group">
  <label for="exampleInputEmail1">Name</label>
  <input type="text" class="form-control my-2"  name="name" placeholder="Enter Name" required="">
  <label for="exampleInputEmail2">Email</label>
  <input type="text" class="form-control "  name="email" placeholder="Enter Email" required="">
  <label for="exampleInputEmail2">Phone Number</label>
  <input type="text" class="form-control "  name="phone_number" placeholder="Phone Number" required="">
  <label for="exampleInputEmail2">Address</label>
  <input type="text" class="form-control "  name="address" placeholder="Address" required="">
</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div>

@endsection