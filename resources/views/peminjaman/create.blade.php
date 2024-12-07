@extends('layouts.admin')

@section('content')
<!-- Menggunakan CSS Select2 -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- Menggunakan jQuery dan Select2 JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- Form Peminjaman -->
            <div class="card shadow-sm border-0">
                <div class="card-header text-center" style="background-color: #4caf50; color: #fff;">
                    <h4 class="mb-0">Peminjaman</h4>
                </div>
                <div class="card-body p-4" style="background-color: #f9f9f9;">
                    <form action="{{ route('peminjaman.store') }}" method="POST">
                        @csrf

                        <!-- Pilihan Anggota -->
                        <div class="mb-4">
                            <label for="member_id" class="form-label"
                                style="font-weight: bold; color: #333;">Anggota</label>
                            <select name="member_id" id="member_id" class="form-select"
                                style="background-color: #fff; border: 1px solid #ddd;">
                                <option selected disabled>Pilih Anggota</option>
                                @foreach ($members as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tanggal Pinjam dan Kembali -->
                        <div class="mb-4">
                            <label for="tanggal_pinjam" class="form-label"
                                style="font-weight: bold; color: #333;">Tanggal</label>
                            <div class="d-flex gap-2">
                                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control"
                                    style="background-color: #fff; border: 1px solid #ddd;">
                                <span class="align-self-center">-</span>
                                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control"
                                    style="background-color: #fff; border: 1px solid #ddd;">
                            </div>
                        </div>

                        <!-- Pilihan Buku (Multiselect) -->
                        <div class="mb-4">
                            <label for="book_id" class="form-label" style="font-weight: bold; color: #333;">Buku</label>
                            <select name="book_id[]" id="book_id" class="form-select js-example-basic-multiple"
                                multiple="multiple"
                                style="background-color: #fff; border: 1px solid #ddd; width: 100%; height: 200px;">
                                <option selected disabled>Pilih Buku</option>
                                @foreach ($books as $item)
                                <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <label class="form-label" style="font-weight: bold; color: #333;">Status</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status1" value="1">
                                <label class="form-check-label" for="status1">
                                    Sudah Dikembalikan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" id="status0" value="0"
                                    checked>
                                <label class="form-check-label" for="status0">
                                    Belum Dikembalikan
                                </label>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="text-end">
                            <button type="submit" class="btn"
                                style="background-color: #4caf50; color: #fff; border: none;">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Area untuk menampilkan buku yang dipilih -->
<div id="selected-books-container" style="margin-top: 10px; font-weight: bold; color: #333;">
    <h5>Buku yang Dipilih:</h5>
    <ul id="selected-books" style="list-style-type: none; padding-left: 0;">
        <li>Tidak ada buku yang dipilih</li>
    </ul>
</div>

<script>
    $(document).ready(function() {
        // Inisialisasi Select2 untuk elemen dengan class js-example-basic-multiple
        $('#book_id').select2({
            placeholder: "Pilih Buku",
            allowClear: true
        });

        // Ketika pilihan buku berubah, tampilkan buku yang dipilih
        $('#book_id').on('change', function() {
            var selectedBooks = $(this).val(); // Ambil nilai yang dipilih
            var displayText = '';

            if (selectedBooks) {
                displayText = "Buku yang dipilih:";
                $('#selected-books').empty(); // Kosongkan daftar sebelumnya
                selectedBooks.forEach(function(bookId) {
                    var bookTitle = $('#book_id option[value="' + bookId + '"]').text();
                    $('#selected-books').append('<li>' + bookTitle + '</li>'); // Tambahkan ke dalam list
                });
            } else {
                $('#selected-books').html('<li>Tidak ada buku yang dipilih</li>'); // Jika tidak ada yang dipilih
            }
        });
    });
</script>
@endsection