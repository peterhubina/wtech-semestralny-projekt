<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'imagePath',
        'altText',
        'product_id',
        'is_titular',
    ];

    public function product() {
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}
