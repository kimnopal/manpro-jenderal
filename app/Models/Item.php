<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    protected $table = 'item';
    
    public function satuan(): BelongsTo {
        return $this->belongsTo(Satuan::class);
    }

}
