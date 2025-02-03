<?php

namespace App\Models;

use App\Models\Proyek;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $table = 'client';

    public function scopeFilterNama(Builder $query) : void {

        $query
        ->where('nama_client', 'like', '%'.\request('search_client').'%')
        ->orWhere('alamat_client', 'like', '%'.\request('search_client').'%')
        ->orWhere('kontak_client', 'like', '%'.\request('search_client').'%')
        ;
    }

    public function invoice(): HasMany
    {
        return $this->hasMany(Invoice::class, 'client_id');
    }

    public function kwitansi(): HasMany
    {
        return $this->hasMany(Kwitansi::class, 'client_id');
    }

    public function proyek(): HasMany{
        return $this->hasMany(Proyek::class, 'klien_id');
    }
}
