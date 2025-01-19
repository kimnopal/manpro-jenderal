<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;

    protected $table = 'item';
    
    public function satuan(): BelongsTo {
        return $this->belongsTo(Satuan::class);
    }

    public function scopeFilterNama(Builder $query) : void {
        
        $query->where('nama_item', 'like', '%'.\request('search_item').'%');
        
    }
}
