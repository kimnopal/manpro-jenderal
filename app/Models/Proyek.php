<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proyek extends Model
{
    protected $table = 'proyek';

    public function pembelians() : HasMany{
        return $this->hasMany(pembelian::class, 'proyekid');
    }

}
