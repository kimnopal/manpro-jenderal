<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
