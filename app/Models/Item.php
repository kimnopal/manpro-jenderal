<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory;

    protected $table = 'item';
    
    public function satuan(): BelongsToMany {

        return $this->belongsToMany(Satuan::class, 'satuan_item');
    }

    public function scopeFilterNama(Builder $query) : void {
        
        $query->where('nama_item', 'like', '%'.\request('search_item').'%')
              ->orWhereHas('satuan', function ($querysatuan) {
                $querysatuan->where('nama_satuan', 'like', '%'.\request('search_item').'%');
              });
        
    }
}
