<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBook extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda dari plural model name
    protected $table = 'peminjaman_books';

    // Jika tabel pivot memiliki kolom lain selain peminjaman_id dan book_id, Anda bisa tentukan di sini
    protected $fillable = [
        'peminjaman_id',
        'book_id',
        'status',
        // Kolom tambahan jika ada
    ];

    // Jika ingin menambahkan relasi ke model Peminjaman
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }

    // Jika ingin menambahkan relasi ke model Book
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}