<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rekening extends Model
{
    protected $table = 'rekening';

    public function bank() : BelongsTo {
        
        return $this->belongsTo(Bank::class);
    }

    public function supplier() : BelongsTo {
        
        return $this->belongsTo(Supplier::class);
    }
}
