<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Satuan extends Model
{
    use HasFactory;
    protected $table = 'satuan';
    protected $fillable = ['nama_satuan'];

    public function item() : HasMany {
        
        return $this->hasMany(Item::class, 'satuan_id');
    }
}
