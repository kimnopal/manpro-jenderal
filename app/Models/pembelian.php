<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $fillable = ['nama_satuan'];
    public function item() : HasMany {
        return $this->hasMany(Item::class, 'proyekid',);
    }
    public function item2() : HasMany {
        return $this->hasMany(Item::class, 'satuanid',);
    }
}