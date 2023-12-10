@extends('layouts.admin')
@section('header', 'Author')


@push('css')
<style type="text/css">

</style>
@endpush
@section('content')
<div id="controller">
  <div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-header">
    <a href="{{url('authors/create')}}" @click="addData()" class="btn btn-sm btn-primary pull-left">Create New author</a>

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
        <div class="card-body p-0">
    <table id="example2" class="table table-striped">
    <thead>
    <tr>
    <th width= "20spx">No</th>
    <th class="text-center" >Name</th>
    <th class="text-center" >Email</th>
    <th class="text-center" >No Telpon</th>
    <th class="text-center" >Alamat</th>
    <th class="text-center" >Action</th>
    </tr>
    </thead>
    <tbody>
        @foreach($authors as $key =>$author)
    <tr>
    <td class="text-center">{{$key+1}}</td>  
    <td class="text-center">{{$author->name}}</td>   
    <td class="text-center">{{$author->email}}</td>   
    <td class="text-center">{{$author->phone_number}}</td>   
    <td class="text-center">{{$author->address}}</td>   
    <td class="text-center d-flex align-items-center justify-content-center">
    <a href="#" v-one="click: #modal-default" class="btn btn-warning btn-sm mr-1">Edit</a>
    {{-- <a href="{{url('author', ['id' => $author->id])}}" method="post">
        <input class="btn btn-danger btn-sm my-2 " type="submit" value="Delete" onclick="return confirm ('Apakah anda ingin menghapus data ini?')">
        @method('delete')
        @csrf --}}
    <form action="{{url('author', ['id' => $author->id])}}" method="POST">
        @method('delete')
        <input class="btn btn-danger btn-sm my-2 " type="submit" value="Delete" onclick="return confirm ('Apakah anda ingin menghapus data ini?')">
        @csrf
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
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{url ('authors') }}" autocomplete="off">
            <div class="modal-header">
            <h4 class="modal-title">Author</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @csrf

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="" required>
                </div>   
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="" required>
                </div>   
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" value="" required>
                </div>   
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" value="" required>
                </div>   
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </form>
            </div>
            </div>
    </div>
  </div>
</div>
        </div>

</div>
    </div>
  </div>
</div>

  </div>
</div>
</div>
  </div>
</div>
@endsection
    
@section('js')
    <script type="text/javascript">
    var controller = new Vue({
        el: '#controller',
        data: {
            data : {},
            actionUrl : '{{url ('authors') }}'
        },
        mounted: function(){

        },
        methods:{
            addData(){
                $('#modal-default').modal();
            },
            editData(data){
                this.data= data;
                $('#modal-default').modal();
            },
            deleteData(){

            }
        }
    });
    </script>


@endsection