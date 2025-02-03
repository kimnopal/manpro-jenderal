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
    public function scopeFilterNama(Builder $query) : void {
        
        $query
        ->where('proyekid', 'like', '%'.\request('search_pembelian').'%');
    }
}