<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';  
  
    protected $fillable = [  
        'no_invoice',  
        'client',  
        'tanggal',  
        'catatan',  
    ];  
  
    public function client()  
    {  
        return $this->belongsTo(Client::class, 'client'); 
    }  
  
    public function details()  
    {  
        return $this->hasMany(InvoiceDetail::class, 'invoice_id'); 
}
}
