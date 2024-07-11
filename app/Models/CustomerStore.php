<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CustomerStore extends Model
{
    use HasFactory;

    protected $fillable = [
            'title',
            'name',
            'gender',
            'phone_number',
            'image',
            'email',
    ];

    public function customerAddresses(): HasMany {
        return $this->hasMany(CustomerAddress::class);
    }

}
