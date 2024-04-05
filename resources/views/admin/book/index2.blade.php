<!DOCTYPE html>
@extends('layouts.admin')
@section('header', 'Books')


@section('css')
  <link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}"> 
@endsection
@section('content')
    <div id="controller">
        <div id="controller">
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="row">
            <div class="col-md-5 offset-md-3">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" autocomplete="off" placeholder="Searching" v-model="search">
                </div>
            </div>
           <div class="card">
                            {{-- <a href="{{ url('members/create') }}" @click="addData()" --}}
                            <a href="javascript:void(0)" @click="addData()" class="btn btn-md btn-primary pull-left">Create New
                                Author</a>
                        </div>
        
                       <hr>
        @foreach($books as $key => $data)
        <div class="col-md-3 col-sm-6 col-xs-12" >
            <div class="info-box">
                <div class="info-box-content">
                            <span class="info-box-text h3">{{$data->title}} ({{$data->qty}})</span>
                            <span class="info-box-number">Rp. {{number_format($data->price)}},-</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" :action="actionUrl" autocomplete="off">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Books</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="text"  name="_method" :value="data.method" hidden>
                            <div class="form-group">
                                <label>ISBN</label>
                                <input type="text" class="form-control" name="isbn" :value="data.isbn" required>
                            </div>
                            
                          
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            
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
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" :action="actionUrl" autocomplete="off">
                            <div class="modal-header">
                                <h4 class="modal-title">Member</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                <input type="text"  name="_method" :value="data.method" hidden>
                                <div class="form-group">
                                    <label>ISBN</label>
                                    <input type="text" class="form-control" name="isbn" :value="data.isbn" required>
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" :value="data.title" required>
                                </div>
                                <div class="form-group">
                                    <label>Year</label>
                                    <input type="text" class="form-control" name="year" :value="data.year" required>
                                </div>
                                <div class="form-group">
                                    <label>Publisher ID</label>
                                    <input type="text" class="form-control" name="publisher_id" :value="data.publisher_id" required>
                                </div>
                                <div class="form-group">
                                    <label>Author ID</label>
                                    <input type="text" class="form-control" name="author_id" :value="data.publisher_id" required>
                                </div>
                                <div class="form-group">
                                    <label>Catalog ID</label>
                                    <input type="text" class="form-control" name="catalog_id" :value="data.catalog_id" required>
                                </div>
                                <div class="form-group">
                                    <label>Qty</label>
                                    <input type="text" class="form-control" name="qty" :value="data.qty" required>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" class="form-control" name="price" :value="data.price" required>
                                </div>
                              
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
<!-- Data Table & Plugin-->
<script src="{{ asset('asset/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('asset/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('asset/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('asset/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('asset/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('asset/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('asset/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript">
     $(function () {
    $("#datatable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#datatable').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });
  });
</script>
{{-- CRUD --}}
    <script type="text/javascript">
        var controller = Vue.createApp({
            data() {
                return {
                    data: {},
                    actionUrl: '{{ url('books') }}'
                };
            },
            mounted:function() {
                
            },
            methods: {
                addData() {  
                    $('#modal-default').modal();
                },
                editData(data) {  
                    this.actionUrl = '{{url('books')}}'+'/'+data.id;
                    data.method = 'PUT';
                    this.data = data;
                    $('#modal-default').modal();
                },
                deleteData(id) {
                     this.actionUrl = '{{url('books')}}'+'/'+id;
                   if(confirm("apakah ingin hapus data ?")){
                    axios.post(this.actionUrl,{_method: 'DELETE'}).then(response =>{
                        location.reload();
                    });
                   }
                }
            }
        });

        controller.mount('#controller');
    </script>




@endsection
