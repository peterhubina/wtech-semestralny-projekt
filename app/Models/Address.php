<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'apartmentNumber',
        'address',
        'zipcode',
        'city',
        'created_at',
        // Any other fields you want to be mass-assignable
    ];

    public function shippingInfo()
    {
        return $this->hasMany(ShippingInfo::class);
    }
}
