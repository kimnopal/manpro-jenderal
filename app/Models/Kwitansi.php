<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kwitansi extends Model
{
    protected $table = 'kwitansi';  
  
    protected $fillable = [  
        'client',  
        'total',  
        'tujuan',  
        'tanggal',  
    ];  
  
    public function client(): BelongsTo  
    {  
        return $this->belongsTo(Client::class); 
    }
    
    public function invoice(): BelongsTo  
    {  
        return $this->belongsTo(Invoice::class); 
    }

    public function scopeFilterKwitansi(Builder $query) : void
    {    
        $query
        ->where('total', 'like', '%'.\request('search_kwitansi').'%')
        ->orWhere('tujuan', 'like', '%'.\request('search_kwitansi').'%')
        ->orWhere('tanggal', 'like', '%'.\request('search_kwitansi').'%')
        ->orWhereHas('client', function ($client_query) {
            $client_query->where('nama_client', 'like', '%'.\request('search_kwitansi').'%');
            })
        ;
    }
}
