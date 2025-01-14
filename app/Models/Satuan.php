<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Satuan extends Model
{
    protected $table = 'satuan';

    public function item() : HasMany {
        
        return $this->hasMany(Item::class, 'satuan_id', 'satuan_id');
    }
}
