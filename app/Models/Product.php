<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'productCode', 'title', 'height', 'description', 'price', 'stockQuantity',
        'createdAt', 'updatedAt', 'deletedAt', 'categoryId'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'ProductTags');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }
}
