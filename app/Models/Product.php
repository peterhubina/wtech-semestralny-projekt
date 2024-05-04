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
        'created_at', 'updated_at', 'deleted_at', 'category_id', 'country', 'type'
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

    public function getTitular()
    {
        return $this->images()->orderByDesc('is_titular')->get();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
