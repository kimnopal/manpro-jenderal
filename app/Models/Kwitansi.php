<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kwitansi extends Model
{
    protected $table = 'kwitansi';  
  
    protected $fillable = [  
        'client',  
        'total',  
        'tujuan',  
        'tanggal',  
    ];  
  
    public function client()  
    {  
        return $this->belongsTo(Client::class, 'client'); 
    }  
}
