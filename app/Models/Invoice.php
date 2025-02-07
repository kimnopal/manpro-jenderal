<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoice';  

    protected $fillable = [  
        'no_invoice',  
        'proyek_id',  
        'tanggal',  
        'catatan',  
    ];

    public function client(): BelongsTo  
    {  
        return $this->belongsTo(Client::class);  
    } 
  
    public function kwitansi(): HasMany  
    {  
        return $this->hasMany(Kwitansi::class, 'invoice_id'); 
    }

    public function detail() {
        return $this->hasMany(InvoiceDetail::class); // Jika satu invoice punya banyak detail
    }
    
    public function proyek(): BelongsTo
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }
    
    public function scopeFilterInvoice(Builder $query) : void {
        
        $query
        ->where('no_invoice', 'like', '%'.\request('search_invoice').'%')
        ->orWhere('tanggal', 'like', '%'.\request('search_invoice').'%')
        ->orWhere('catatan', 'like', '%'.\request('search_invoice').'%')
        ->orWhereHas('proyek_id', function ($client_query) {
            $client_query->where('nama_client', 'like', '%'.\request('search_invoice').'%');
            })
        ;

    }
    
}
