<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingInfo extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'firstname',
        'lastname',
        'phoneNumber',
        'email',
        'note',
        'delivery',
        'address_id',
        'created_at',
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
