<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'totalPrice', 'payment', 'created_at', 'userId', 'shippingId'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shippingInfo()
    {
        return $this->hasOne(ShippingInfo::class);
    }
}
