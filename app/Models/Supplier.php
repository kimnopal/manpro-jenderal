<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';

    public function rekening() : HasOne {
        
        return $this->hasOne(Rekening::class, 'supplier_id');
    }
}
