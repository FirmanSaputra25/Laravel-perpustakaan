<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranscationDetail extends Model
{
    use HasFactory;
    public function transcation()
    {
        return $this->belongsTo(TranscationDetail::class, 'transaction_id');
    }
    public function books(){
        return $this->belongsTo(book::class, 'book_id');
    }
}