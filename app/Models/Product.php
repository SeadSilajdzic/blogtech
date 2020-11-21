<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = [
        'deleted_at'
    ];

    protected $fillable = [
        'product_category_id',
        'image',
        'title',
        'price',
        'description',
        'slug',
        'published'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}
