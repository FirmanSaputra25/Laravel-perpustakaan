@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0 rounded-3 mx-auto" style="max-width: 500px;">
        <div class="card-header bg-primary text-white text-center py-3">
            <h5 class="mb-0">Detail Peminjaman</h5>
        </div>
        <div class="card-body p-4 text-center">
            <!-- Anggota -->
            <div class="mb-3">
                <label class="form-label"><strong>Anggota</strong></label>
                <p class="mb-0">{{ $peminjaman->member->name }}</p>
            </div>
            <hr>

            <!-- Tanggal Pinjam -->
            <div class="mb-3">
                <label class="form-label"><strong>Tanggal Pinjam</strong></label>
                <p class="mb-0">{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}</p>
            </div>
            <hr>

            <!-- Tanggal Kembali -->
            <div class="mb-3">
                <label class="form-label"><strong>Tanggal Kembali</strong></label>
                <p class="mb-0">
                    {{ $peminjaman->tanggal_kembali ? \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d M
                    Y') : 'Belum Ditentukan' }}
                </p>
            </div>
            <hr>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label"><strong>Status</strong></label>
                <p class="mb-0">
                    @if ($peminjaman->status)
                    <span class="badge bg-success">Sudah Dikembalikan</span>
                    @else
                    <span class="badge bg-warning text-dark">Belum Dikembalikan</span>
                    @endif
                </p>
            </div>
            <hr>

            <!-- Daftar Buku -->
            <div class="mb-3">
                <label class="form-label"><strong>Buku yang Dipinjam</strong></label>
                <p class="mb-0">
                    @if ($peminjaman->books->isNotEmpty())
                    @foreach ($peminjaman->books as $book)
                    {{ $book->title }}<br>
                    @endforeach
                    @else
                    Tidak ada buku yang dipinjam.
                    @endif
                </p>
            </div>


            <hr>

            <!-- Tombol Kembali -->
            <div class="text-center mt-3">
                <a href="{{ route('peminjaman.index') }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-arrow-left-circle me-2"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection