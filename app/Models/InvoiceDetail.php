<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $table = 'invoice_detail';  
  
    protected $fillable = [  
        'invoice_id',  
        'deskripsi',  
        'harga',  
        'qty',  
        'total',  
    ];  
  
    // public function invoice()  
    // {  
    //     return $this->belongsTo(Invoice::class, 'invoice_id');  
    // }  
}
