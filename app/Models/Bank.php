<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    use HasFactory;

    protected $table = 'bank';

    public function rekenings() : HasMany {
        
        return $this->hasMany(Rekening::class, 'bank_id');
    }

    public function scopeFilterNama(Builder $query) : void {
        
        $query->where('nama_bank', 'like', '%'.\request('search_bank').'%');
    }
}
