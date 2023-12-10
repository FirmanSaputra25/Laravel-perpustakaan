    @extends('layouts.admin')
    @section('header', 'Publisher')
    
    @section('content')
        <div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-header">
    <a href="{{url('publishers/create')}}" class="btn btn-sm btn-primary pull-left">Create New Publisher</a>

    <div class="card-tools">
    <div class="input-group input-group-sm" style="width: 150px;">
    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
    <div class="input-group-append">
    <button type="submit" class="btn btn-default">
    <i class="fas fa-search"></i>
    </button>
    </div>
    </div>
    </div>
    </div>

    <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
    <thead>
        @csrf
    <tr>
    <th class="text-center">ID</th>
    <th class="text-center" >Name</th>
    <th class="text-center" >Email</th>
    <th class="text-center" >No Telpon</th>
    <th class="text-center" >Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($publishers as $key =>$publisher)
    <tr>
    <td class="text-center">{{$key+1}}</td>  
    <td class="text-center">{{$publisher->name}}</td>   
    <td class="text-center">{{$publisher->email}}</td>   
    <td class="text-center">{{$publisher->phone_number}}</td>   
    <td class="text-center d-flex align-items-center justify-content-center">
    <a href="{{url ('publisher/' .$publisher->id. '/edit')}}" class="btn btn-warning btn-sm mr-1">Edit</a>
    {{-- <a href="{{url('publisher', ['id' => $publisher->id])}}" method="post">
        <input class="btn btn-danger btn-sm my-2 " type="submit" value="Delete" onclick="return confirm ('Apakah anda ingin menghapus data ini?')">
        @method('delete')
        @csrf --}}
    <form action="{{url('publisher', ['id' => $publisher->id])}}" method="POST">
        @method('delete')
        <input class="btn btn-danger btn-sm my-2 " type="submit" value="Delete" onclick="return confirm ('Apakah anda ingin menghapus data ini?')"> 
        
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
    <div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    @endsection