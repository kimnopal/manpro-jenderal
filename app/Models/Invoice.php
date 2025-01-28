<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Invoice extends Model
{
    protected $table = 'invoice';  

    public function client(): BelongsTo  
    {  
        return $this->belongsTo(Client::class);  
    } 
  
    public function details(): HasMany  
    {  
        return $this->hasMany(InvoiceDetail::class, 'invoice_id'); 
    }

    public function scopeFilterInvoice(Builder $query) : void {
        
        $query
        ->where('no_invoice', 'like', '%'.\request('search_invoice').'%')
        ->orWhere('tanggal', 'like', '%'.\request('search_invoice').'%')
        ->orWhere('catatan', 'like', '%'.\request('search_invoice').'%')
        ->orWhereHas('client', function ($client_query) {
            $client_query->where('nama_client', 'like', '%'.\request('search_invoice').'%');
            })
        ;

    }
}
