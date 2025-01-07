<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;
    protected $table = "technologies";
    protected $fillable = [
        'name',
        'image_url'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_technology', 'technology_id', 'product_id');
    }
}
