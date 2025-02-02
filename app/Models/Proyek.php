<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Proyek extends Model
{
    use HasFactory;
    protected $table = 'proyek';

    public function pembelians() : HasMany{
        return $this->hasMany(pembelian::class, 'proyekid');
    }

    public function scopeFilterNama(Builder $query) : void {

        $query->where('no_proyek', 'like', '%'.\request('search_proyek').'%');
    }

    public function client(): BelongsTo {
        return $this->belongsTo(Client::class, 'klien_id');
    }
}
