<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function scopeFilterNama(Builder $query) : void
    {    
        $query
        ->where('nama_client', 'like', '%'.\request('search_kwitansi').'%')
        ->orWhere('alamat_client', 'like', '%'.\request('search_kwitansi').'%')
        ->orWhere('kontak_client', 'like', '%'.\request('search_kwitansi').'%')
        ;
    }
}
