<!DOCTYPE html>
@extends('layouts.admin')
@section('header', 'Books')

@section('css')
<link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable">
                    </div>
                </div>
                <div class="card">
                    <a href="javascript:void(0)" @click="addData()" class="btn btn-sm btn-primary pull-left">Create New Author</a>
                </div>
                @foreach($books as $key => $data)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box" href="#" @click="editData({{ $data }})" data-target="#modal-default">
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
                            <input type="text" name="_method" :value="data.method" hidden>
                            <div class="form-group">
                                <label>ISBN</label>
                                <input type="text" class="form-control" name="isbn" v-model="data.isbn" required>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" v-model="data.title" required>
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text" class="form-control" name="tahun" v-model="data.year" required>
                            </div>
                            <div class="form-group">
                                <label>Publisher</label>
                                <select name="publisher_id" class="form-control" v-model="data.publisher_id"> 
                                    @foreach($publishers as $publisher)
                                        <option value="{{$publisher->id}}"> {{$publisher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <select name="author_id" class="form-control" v-model="data.author_id"> 
                                    @foreach($authors as $author)
                                        <option value="{{$author->id}}"> {{$author->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Catalog</label>
                                <select name="catalog_id" class="form-control" v-model="data.catalog_id"> 
                                    @foreach($catalogs as $catalog)
                                        <option value="{{$catalog->id}}"> {{$catalog->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Qty</label>
                                <input type="text" class="form-control" name="qty" v-model="data.qty" required>
                            </div>
                            <div class="form-group">
                                <label>Harga Pinjam</label>
                                <input type="text" class="form-control" name="price" v-model="data.price" required>
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
        <div class="modal fade" id="modal-edit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form  action="" autocomplete="off" method="DELETE">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Books</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="text" name="_method" :value="data.method" hidden>
                            <div class="form-group">
                                <label>ISBN</label>
                                <input type="text" class="form-control" name="isbn" v-model="data.isbn" required>
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" v-model="data.title" required>
                            </div>
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="text" class="form-control" name="tahun" v-model="data.year" required>
                            </div>
                            <div class="form-group">
                                <label>Publisher</label>
                                <select name="publisher_id" class="form-control" v-model="data.publisher_id"> 
                                    @foreach($publishers as $publisher)
                                        <option value="{{$publisher->id}}"> {{$publisher->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Author</label>
                                <select name="author_id" class="form-control" v-model="data.author_id"> 
                                    @foreach($authors as $author)
                                        <option value="{{$author->id}}"> {{$author->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Catalog</label>
                                <select name="catalog_id" class="form-control" v-model="data.catalog_id"> 
                                    @foreach($catalogs as $catalog)
                                        <option value="{{$catalog->id}}"> {{$catalog->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Qty</label>
                                <input type="text" class="form-control" name="qty" v-model="data.qty" required>
                            </div>
                            <div class="form-group">
                                <label>Harga Pinjam</label>
                                <input type="text" class="form-control" name="price" v-model="data.price" required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <a href="#" @click="deleteData({{ $data -> id }})"
                                class="btn btn-danger btn-sm"> Delete</a>
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
                data: {
                    id: 0,
                    isbn: '',
                    title: '',
                    year: '',
                    publisher_id: '',
                    author_id: '',
                    catalog_id: '',
                    qty: '',
                    price: '',
                    method: ''
                },
                actionUrl: '{{ url('books') }}',
                search: '',
                books: {!! json_encode($books) !!}
            };
        },
        mounted:function() {
                
        },
        methods: {
            addData() {
                this.resetData();
                $('#modal-default').modal();
            },
            editData(data) {
                // Mengatur nilai properti data sesuai dengan data yang diterima
                this.data.id = data.id;
                this.data.isbn = data.isbn;
                this.data.title = data.title;
                this.data.year = data.year;
                this.data.publisher_id = data.publisher_id;
                this.data.author_id = data.author_id;
                this.data.catalog_id = data.catalog_id;
                this.data.qty = data.qty;
                this.data.price = data.price;

                // Mengatur method untuk pengiriman formulir sesuai dengan metode PUT
                this.data.method = 'PUT';
                $('#modal-edit').modal();
            },
            deleteData(id) {
                if(confirm("apakah ingin hapus data ?")){
                    // Menambahkan token CSRF ke dalam header permintaan
                    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    
                    // Mengirim permintaan DELETE menggunakan Axios
                    axios.delete('{{url('books')}}/hapus'+id)
                    .then(response => {
                        location.reload();
                    });
                }
            },
            resetData() {
                this.data = {
                    id: 0,
                    isbn: '',
                    title: '',
                    year: '',
                    publisher_id: '',
                    author_id: '',
                    catalog_id: '',
                    qty: '',
                    price: '',
                    method: 'POST'
                };
            },
        },
    });

    controller.mount('#controller');
</script>
@endsection