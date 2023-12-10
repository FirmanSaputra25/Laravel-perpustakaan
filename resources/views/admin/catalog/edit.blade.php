@extends ('layouts.admin')
@section('header', 'Catalog')

@section('content')
 <section class="content">
<div class="container-fluid">
<class="row">

<div class="col-md-6">

<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Edit New Katalog</h3>
</div>


<form action="{{url('catalogs/'.$catalog->id)}}" method="post" >
  {{method_field('put')}}
  @csrf
<div class="card-body">
<div class="form-group">
<label for="exampleInputEmail1">Name</label>
<input type="text" class="form-control"  name="name" placeholder="Enter Name" required="" value="{{$catalog->name}}">
</div>

<div class="card-footer">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
</div>
</div>
@endsection