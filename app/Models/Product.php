<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $casts = [
        'project_started_at' => 'datetime',
        'project_ended_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'product_technology', 'product_id', 'technology_id');
    }

    public function images()
    {
        return $this->beLongsToMany(Image::class, 'product_image', 'product_id', 'image_id');
    }
}
