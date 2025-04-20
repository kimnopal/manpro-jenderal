<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';  
  
    protected $fillable = [  
        'invoice_id',
        'termin_no',
        'status',
        'nominal',
        'kode_pembayaran',  
    ];  
    public function pembayaran()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function getTanggalBayarFormattedAttribute()
    {
        return $this->tanggal_bayar ? \Carbon\Carbon::parse($this->tanggal_bayar)->format('d/m/Y') : '-';
    }

    // public function proyek()  
    // {  
    //     return $this->belongsTo(Proyek::class, 'id_proyek');  
    // }  
}
