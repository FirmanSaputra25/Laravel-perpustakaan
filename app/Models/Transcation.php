<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transcation extends Model
{
    // Specify the table name if it's different from the model name
    protected $table = 'transcations'; // Replace 'transcations' with your actual table name if different

    // Specify which attributes can be mass-assigned
    protected $fillable = ['member_id', 'date_start', 'date_end'];

    // Define the relationship with the Member model
    public function member()    
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function transcationDetail(){
        return $this->hasMany(TranscationDetail::class, 'transaction_id' );
    }
}