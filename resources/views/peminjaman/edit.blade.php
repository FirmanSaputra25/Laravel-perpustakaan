@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Peminjaman</h1>
    <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="book_id">Buku</label>
            <select name="book_id" id="book_id" class="form-control">
                @foreach ($books as $item)
                <option value="{{ $item->id }}" {{ $item->id == $peminjaman->book_id ? 'selected' : '' }}>
                    {{ $item->title }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="member_id">Anggota</label>
            <select name="member_id" id="member_id" class="form-control">
                @foreach ($members as $item)
                <option value="{{ $item->id }}" {{ $item->id == $peminjaman->member_id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tanggal_pinjam">Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control"
                value="{{ $peminjaman->tanggal_pinjam }}" required>
        </div>

        <div class="form-group">
            <label for="tanggal_kembali">Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control"
                value="{{ $peminjaman->tanggal_kembali }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="1" {{ $peminjaman->status == 1 ? 'selected' : '' }}>Sudah Dikembalikan</option>
                <option value="0" {{ $peminjaman->status == 0 ? 'selected' : '' }}>Belum Dikembalikan</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection