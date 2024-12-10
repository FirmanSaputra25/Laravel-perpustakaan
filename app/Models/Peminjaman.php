<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman'; // Tentukan nama tabel jika berbeda dari nama model yang dikehendaki

    protected $fillable = [
        'member_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
    ];


    // Model Peminjaman.php
    public function books()
    {
        return $this->belongsToMany(Book::class, 'peminjaman_books')->withPivot('status');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id'); // Menggunakan member_id untuk relasi
    }
}
