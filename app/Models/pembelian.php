<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
class pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    
    public function supplier() : BelongsTo{
        return $this->belongsTo(Supplier::class, 'supplierid');
    }
    public function proyek() : BelongsTo{
        return $this->belongsTo(Proyek::class, 'proyekid');
    }
    public function satuan() : BelongsTo{
        return $this->belongsTo(Satuan::class, 'satuanid');
    }
    public function scopeFilterPembelian(Builder $query) : void {
        
        
        $query
        ->whereHas('supplier', function ($supplier_query) {
            $supplier_query->where('nama_supplier', 'like', '%'.request('search_pembelian').'%');
            })
        ->orWhereHas('satuan', function ($satuan_query) {
            $satuan_query->where('nama_satuan', 'like', '%'.\request('search_pembelian').'%');
            })
        ->orWhereHas('proyek', function ($proyek_query) {
            $proyek_query->where('no_proyek', 'like', '%'.\request('search_pembelian').'%');
            })
        ->orWhere('qty', 'like', '%'.\request('search_pembelian').'%')
        ->orWhere('hargabeli', 'like', '%'.\request('search_pembelian').'%')
        ;

    }
}