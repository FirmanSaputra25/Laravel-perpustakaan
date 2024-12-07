<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Book; // Pastikan nama model sesuai dengan file model Anda
use App\Models\Member; // Pastikan nama model sesuai dengan file model Anda
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with('books', 'member')->get();
        $peminjaman->each(function ($item) {
            // Menghitung Lama Peminjaman
            $item->lama_peminjaman = $item->tanggal_kembali ?
                \Carbon\Carbon::parse($item->tanggal_pinjam)->diffInDays($item->tanggal_kembali) :
                \Carbon\Carbon::parse($item->tanggal_pinjam)->diffInDays(now());
        });

        return view('peminjaman.index', compact('peminjaman'));
    }
    public function create()
    {
        // Mendapatkan data yang dibutuhkan untuk form, misalnya buku dan anggota
        $books = Book::all(); // Ganti variabel buku dengan books
        $members = Member::all(); // Ganti variabel anggota dengan members
        return view('peminjaman.create', compact('books', 'members')); // Kirim data ke view
    }
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'book_id' => 'required|array|min:1', // Harus berupa array dan minimal ada 1 buku yang dipilih
            'book_id.*' => 'exists:books,id', // Pastikan setiap ID buku yang dipilih ada di database
            'member_id' => 'required|exists:members,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'status' => 'required|boolean',
        ]);

        $firstPeminjaman = null;

        // Simpan data peminjaman untuk setiap buku yang dipilih
        foreach ($validated['book_id'] as $bookId) {
            $peminjaman = Peminjaman::create([
                'book_id' => $bookId,
                'member_id' => $validated['member_id'],
                'tanggal_pinjam' => $validated['tanggal_pinjam'],
                'tanggal_kembali' => $validated['tanggal_kembali'],
                'status' => $validated['status'],
            ]);

            // Simpan peminjaman pertama
            if (!$firstPeminjaman) {
                $firstPeminjaman = $peminjaman;
            }
        }

        // Jika $firstPeminjaman tetap null (tidak ada data yang disimpan)
        if (!$firstPeminjaman) {
            session()->flash('error', 'Tidak ada data peminjaman yang berhasil disimpan.');
            return redirect()->route('peminjaman.index'); // Redirect ke index
        }

        // Menambahkan flash message jika berhasil
        session()->flash('success', 'Data peminjaman berhasil ditambahkan.');

        // Redirect ke halaman detail peminjaman pertama
        return redirect()->route('peminjaman.show', ['id' => $firstPeminjaman->id]);
    }


    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $books = Book::all();  // Mengambil semua buku
        $members = Member::all();  // Mengambil semua anggota
        return view('peminjaman.edit', compact('peminjaman', 'books', 'members'));
    }



    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $validated = $request->validate([
            'book_id' => 'required',  // Ganti dengan book_id
            'member_id' => 'required',  // Ganti dengan member_id
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date',
            'status' => 'required|boolean',
        ]);

        // Ambil data peminjaman berdasarkan ID
        $peminjaman = Peminjaman::findOrFail($id);

        // Update data peminjaman dengan data yang sudah divalidasi
        $peminjaman->update([
            'book_id' => $validated['book_id'],  // Ganti dengan book_id
            'member_id' => $validated['member_id'],  // Ganti dengan member_id
            'tanggal_pinjam' => $validated['tanggal_pinjam'],
            'tanggal_kembali' => $validated['tanggal_kembali'],
            'status' => $validated['status'],
        ]);

        // Redirect ke halaman show untuk peminjaman yang baru saja diupdate
        return redirect()->route('peminjaman.show', $peminjaman->id)
            ->with('success', 'Data peminjaman berhasil diperbarui.');
    }


    public function destroy($id)
    {
        // Mencari peminjaman berdasarkan ID
        $peminjaman = Peminjaman::findOrFail($id);

        // Hapus data peminjaman
        $peminjaman->delete();

        // Redirect ke halaman index setelah data berhasil dihapus
        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }

    public function show($id)
    {
        $peminjaman = Peminjaman::with('books', 'member')->findOrFail($id);
        return view('peminjaman.show', compact('peminjaman'));
    }
}