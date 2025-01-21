<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    
    public function supplier() : BelongsTo{
        return $this->belongsTo(Supplier::class);
    }
    public function proyek() : BelongsTo{
        return $this->belongsTo(Proyek::class);
    }
    public function satuan() : BelongsTo{
        return $this->belongsTo(Satuan::class);
    }
}