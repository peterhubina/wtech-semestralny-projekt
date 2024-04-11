<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

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
        return $this->hasMany(Image::class, 'product_id');
    }

    public function tags() : BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'ProductTags');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
