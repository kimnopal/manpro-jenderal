<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';  
  
    protected $fillable = [  
        'id_proyek',  
        'status',  
        'nominal',  
        'kode_pembayaran',  
    ];  
  
    // public function proyek()  
    // {  
    //     return $this->belongsTo(Proyek::class, 'id_proyek');  
    // }  
}
