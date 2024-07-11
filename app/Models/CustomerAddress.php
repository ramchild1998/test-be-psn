<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerAddress extends Model
{
    use HasFactory;

    protected $fillable = [
            'customer_id',
            'address',
            'district',
            'city',
            'province',
            'postal_code',
    ];

    public function customerStore(): BelongsTo {
        return $this->belongsTo(CustomerStore::class);
    }

}
