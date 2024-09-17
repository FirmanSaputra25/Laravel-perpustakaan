<!DOCTYPE html>
@extends('layouts.admin')
@section('header', 'Transcation')

@section('css')
<link rel="stylesheet" href="{{asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
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
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="javascript:void(0)" @click="addData()" class="btn btn-sm btn-primary pull-left">Create New
                        Transcation</a>
                </div>
                <div class="card-body p-0">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th class="text-center">Date Start</th>
                                <th class="text-center">Date End</th>
                                <th class="text-center">Member Name</th>
                                <th class="text-center">Duration (Days)</th>
                                <th class="text-center">Total Book</th>
                                <th class="text-center">Total Payment</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $key1 => $member)
                            @foreach ($member->transcation as $key2 => $transcation)
                            {{-- @dd($transcation->toArray()) --}}
                            <tr>
                                <td class="text-center">{{ $key2 + 1 }}</td>
                                <td class="text-center">{{ $transcation->date_start }}</td>
                                <td class="text-center">{{ $transcation->date_end }}</td>
                                <td class="text-center">{{ $transcation->member->name }}</td>
                                <td class="text-center">
                                    @php
                                    $dateStart = \Carbon\Carbon::parse($transcation->date_start);
                                    $dateEnd = \Carbon\Carbon::parse($transcation->date_end);
                                    $duration = $dateStart->diffInDays($dateEnd);
                                    @endphp
                                    {{ $duration }}
                                </td>
                                <td class="text-center">
                                    @php
                                    $qty = 0;
                                    // dd($transcation->toArray()[('transcation_detail')]);
                                    foreach ($transcation->toArray()[('transcation_detail')] as $key3 =>
                                    $transcationDetail) {
                                    $qty += $transcationDetail['qty'];
                                    }
                                    // dd($qty);

                                    @endphp
                                    {{$qty}}
                                </td>
                                <td class="text-center">
                                    @php
                                    $price = 0;
                                    // dd($transcation->toArray()[('transcation_detail')]);
                                    foreach ($transcation->toArray()[('transcation_detail')] as $key4 =>
                                    $transcationDetail) {
                                    // dd($transcationDetail);
                                    $price += $transcationDetail['books']['price'];
                                    }

                                    @endphp
                                    {{$price}}
                                </td>
                                <td class="text-center"></td>
                                <td class="text-center d-flex align-items-center justify-content-center">
                                    <a href="#" @click="editData({{ $transcation->id }})"
                                        class="btn btn-warning btn-sm mr-1">Edit</a>
                                    <a href="#" @click="deleteData({{ $transcation->id }})"
                                        class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" :action="actionUrl" autocomplete="off">
                    <div class="modal-header">
                        <h4 class="modal-title">Transcation</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="text" name="_method" :value="data.method" hidden>
                        <div class="form-group">
                            <label>Member</label>
                            <select class="form-control" name="member_id" required>
                                @foreach ($members as $member)
                                <option value="{{ $member->id }}" {{ old('member_id')==$member->id ? 'selected' : '' }}>
                                    {{ $member->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Date Start</label>
                            <input type="date" class="form-control" name="date_start" value="{{ old('date_start') }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Date Start</label>
                            <input type="date" class="form-control" name="date_end" value="{{ old('date_end') }}"
                                required>
                        </div>
                        <div class="form-group">
                            <label>Book</label>
                            <select class="form-control" name="books" required>
                                @foreach ($books as $book)
                                <option value="{{ $book->id }}" {{ old('books', $transcation->book_id) == $book->id ?
                                    'selected' : '' }}>
                                    {{ $book->title }}
                                </option>
                                @endforeach
                            </select>
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
});
</script>

<script type="text/javascript">
    var controller = Vue.createApp({
    data() {
        return {
            data: {},
            actionUrl: '{{ url('transcactions') }}'
        };
    },
    methods: {
        addData() {
            this.data = {};
            this.actionUrl = '{{ url('transcactions') }}';
            $('#modal-default').modal();
        },
        editData(data) {
            this.actionUrl = '{{ url('transcactions') }}/' + data.id;
            data.method = 'PUT';
            this.data = data;
            $('#modal-default').modal();
        },
        deleteData(id) {
            if(confirm("Apakah ingin menghapus data?")) {
                axios.post('{{ url('transcactions') }}/' + id, { _method: 'DELETE' })
                .then(response => {
                    location.reload();
                });
            }
        }
    }
});

controller.mount('#controller');
</script>

@endsection