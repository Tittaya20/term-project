<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'product_size',
        'name',
        'price',
        'description',
        'image',
        'brand_id',
        'category_id',
    ];
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function category(): BelongsTo
    {
    return $this->belongsTo(Category::class,'category_id');
    }
}