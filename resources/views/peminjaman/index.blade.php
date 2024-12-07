@extends('layouts.admin')

@section('content')
<style>
    .table th,
    .table td {
        font-size: 12px;
        white-space: nowrap;
    }
</style>

<div class="container">
    <div class="row mb-4">
        <div class="col-md-3">
            <select id="status-filter" class="form-control">
                <option value="">Semua Status</option>
                <option value="1">Sudah Dikembalikan</option>
                <option value="0">Belum Dikembalikan</option>
            </select>
        </div>
        <div class="col-md-3">
            <input type="date" id="tanggal-filter" class="form-control">
        </div>
        <div class="col-md-3">
            <button id="filter-button" class="btn btn-primary">Filter</button>
        </div>
        <div class="col-md-3">
            <a href="{{ route('peminjaman.create') }}" class="btn btn-success">Tambah Peminjaman</a>
        </div>
    </div>


    <!-- Tabel Peminjaman -->
    <table id="peminjaman-table" class="table table-bordered">
        <thead>
            <tr>
                <th class="text-nowrap" style="font-size: 15px;">Nama Peminjam</th>
                <th class="text-nowrap" style="font-size: 15px;">Tanggal Pinjam</th>
                <th class="text-nowrap" style="font-size: 15px;">Tanggal Kembali</th>
                <th class="text-nowrap" style="font-size: 15px;">Lama Peminjaman (hari)</th>
                <th class="text-nowrap" style="font-size: 15px;">Total Buku</th>
                <th class="text-nowrap" style="font-size: 15px;">Total Bayar</th>
                <th class="text-nowrap" style="font-size: 15px;">Status</th>
                <th class="text-nowrap" style="font-size: 15px;">Action</th>
            </tr>
        </thead>

        <tbody>
            @if (session('success'))
            <script>
                alert('{{ session('success') }}');
            </script>
            @endif

            @foreach ($peminjaman as $item)

            <tr>
                <td style="font-size: 12px;" class="text-nowrap">{{ $item->member->name }}</td>
                <td style="font-size: 12px;" class="text-nowrap">{{ $item->tanggal_pinjam }}</td>
                <td style="font-size: 12px;" class="text-nowrap">{{ $item->tanggal_kembali }}</td>
                <td style="font-size: 12px;" class="text-nowrap">{{ $item->lama_peminjaman }}</td>
                <td style="font-size: 12px;" class="text-nowrap">{{ $item->total_buku }}</td>
                <td style="font-size: 12px;" class="text-nowrap">{{ $item->total_bayar }}</td>
                <td style="font-size: 12px;" class="text-nowrap">{{ $item->status ? 'Sudah Dikembalikan' : 'Belum
                    Dikembalikan' }}</td>
                <td>
                    <a href="{{ route('peminjaman.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <!-- Form delete -->
                    <form action="{{ route('peminjaman.destroy', $item->id) }}" method="POST" style="display:inline;"
                        onsubmit="return confirmDelete()">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach

        </tbody>


    </table>
</div>
<!-- Tambahkan jQuery terlebih dahulu -->
<script>
    function confirmDelete() {
        return confirm('Apakah Anda yakin ingin menghapus data ini?');
    }
</script>

<script>
    $(function() {
        // Inisialisasi DataTable
        var table = $('#peminjaman-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('peminjaman.index') }}",
                data: function(d) {
                    // Menambahkan parameter status dan tanggal_pinjam ke query
                    d.status = $('#status-filter').val(); // Mengambil nilai status dari filter
                    d.tanggal_pinjam = $('#tanggal-filter').val(); // Mengambil nilai tanggal dari filter
                }
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'book.title', name: 'book.title'},  // Tampilkan judul buku
                {data: 'member.name', name: 'member.name'},  // Tampilkan nama anggota
                {data: 'tanggal_pinjam', name: 'tanggal_pinjam'},
                {data: 'tanggal_kembali', name: 'tanggal_kembali'},
                {data: 'status', name: 'status', render: function(data) {
                    return data ? 'Sudah Dikembalikan' : 'Belum Dikembalikan';
                }},
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        // Tombol Edit dan Delete
                        return `
                            <a href="/peminjaman/${row.id}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/peminjaman/${row.id}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        `;
                    }
                }
            ]
        });

        // Filter event
        $('#filter-button').click(function() {
            table.ajax.reload(); // Memuat ulang DataTable dengan filter
        });
    });
</script>

@endsection