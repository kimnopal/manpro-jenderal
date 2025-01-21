<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Relations\HasOne;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';

    public function rekenings() : HasMany {
        
        return $this->hasMany(Rekening::class, 'supplier_id');
    }

    

    public function scopeFilternama(Builder $query) : void {
        
        $query->where('nama_supplier', 'like', '%'.\request('search_nama').'%');
    }

    public function pembelians() : HasMany{
        return $this->hasMany(pembelian::class, 'supplierid');
    }
}

