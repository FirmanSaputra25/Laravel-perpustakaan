<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id(); // Primary key ID
            $table->unsignedBigInteger('book_id'); // Relasi ke tabel books
            $table->unsignedBigInteger('member_id'); // Relasi ke tabel members
            $table->date('tanggal_pinjam'); // Tanggal pinjam
            $table->date('tanggal_kembali')->nullable(); // Tanggal kembali (nullable)
            $table->boolean('status')->default(0); // Status apakah sudah dikembalikan atau belum
            $table->timestamps(); // Timestamps untuk created_at dan updated_at

            // Definisikan foreign key
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}