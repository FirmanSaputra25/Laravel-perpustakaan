<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $fillable = [
        'isbn',
        'title',
        'year',
        'publisher_id',
        'author_id',
        'catalog_id',
        'qty',
        'price', // Tambahkan field _token ke dalam fillable
    ];
    use HasFactory;
    public function author()
{
    return $this->belongsTo('App\Models\Author', 'author_id');
}
public function publisher()
{
    return $this->belongsTo('App\Models\Publisher', 'publisher_id');
}
public function catalog()
{
    return $this->belongsTo('App\Models\Catalog', 'catalog_id');
}
public function transcationDetail(){
    return $this->hasOne(TranscationDetail::class, 'book_id');
}
}