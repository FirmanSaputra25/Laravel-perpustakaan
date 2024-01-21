<!DOCTYPE html>
@extends('layouts.admin')
@section('header', 'Author')    


@section('css')
   <!--Data table -->
   <link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">  
@endsection
@section('content')
    <div id="controller">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <a href="{{ url('authors/create') }}" @click="addData()" --}}
                        <a href="javascript:void(0)" @click="addData()" class="btn btn-sm btn-primary pull-left">Create New
                            author</a>
                        </div>
                        <div class="card-body p-0">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width= "20px">No</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">No Telpon</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" :action="actionUrl" autocomplete="off">
                            <div class="modal-header">
                                <h4 class="modal-title">Author</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @csrf
                                 <input type="text"  name="_method" :value="data.method" hidden>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" :value="data.name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" :value="data.email" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" name="phone_number" :value="data.phone_number" required>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" :value="data.address" required>
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
    var actionUrl = '{{url ('authors')}}';
    var apiUrl = '{{url ('api/authors')}}';
    
    var columns = [
        {data: 'DT_RowIndex' ,class: 'text-center' , orderable:true},
        {data: 'name' ,class: 'text-center' , orderable:true},
        {data: 'email' ,class: 'text-center' , orderable:true},
        {data: 'phone_number' ,class: 'text-center' , orderable:true},
        {data: 'address' ,class: 'text-center' , orderable:true},
        {render:function (index,row,data,meta){
            return `
            <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})"
            >Edit</a>
            <a class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})"
            >Delete</a>`;

        }, orderable: false, width: '200px', class: 'text-center'},
        
    ];

    var controller = new Vue({
        el: '#controller',
        data: {
            datas:[],
            data: {},
            actionUrl,
            apiUrl,
            editData: false,
        },
        mounted:function(){
            this.datatable(); 
        },
            methods: {
                datatable(){
                const _this = this;
                _this.table = $('#datatable').DataTable({
                    ajax: {
                        url: _this.apiUrl,
                        type: 'GET',
                    },
                    columns: columns
                }).on('xhr', function(){
                    _this.datas = _this.table.ajax.json().data;
                });
            },
        }
    });
     controller.mount('#controller');
     
</script>
@endsection

 {{-- <script type="text/javascript">
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
 

<!-- CRUD-->
    <script type="text/javascript">
        var controller = Vue.createApp({
            data() {
                return {
                    data: {},
                    actionUrl: '{{ url('author') }}'
                };
            },
            mounted:function() {
                
            },
            methods: {
                addData() {  
                    $('#modal-default').modal();
                },
                editData(data) {
                     this.actionUrl = '{{url('authors')}}'+'/'+data.id;
                    data.method = 'PUT';
                    this.data = data;
                    $('#modal-default').modal();
                },
                deleteData(id) {
                     this.actionUrl = '{{url('authors')}}'+'/'+id;
                   if(confirm("apakah ingin hapus data ?")){
                    axios.post(this.actionUrl,{_method: 'DELETE'}).then(response =>{
                        location.reload();
                    });
                   }
                }
            }
        });

        // Attach the Vue instance to the element with the ID 'controller'
        controller.mount('#controller');
    </script>


@endsection --}}
