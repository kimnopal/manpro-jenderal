<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Satuan extends Model
{
    use HasFactory;
    protected $table = 'satuan';

    public function items() : HasMany {
        
        return $this->hasMany(Item::class, 'satuan_id');
    }

    public function scopeFilterNama(Builder $query) : void {
        
        $query->where('nama_satuan', 'like', '%'.\request('search_satuan').'%');
    }

    public function pembelians() : HasMany{
        return $this->hasMany(pembelian::class, 'satuanid');
    }
}
