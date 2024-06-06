<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'country',
        'phone',
    ];

    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }
}
