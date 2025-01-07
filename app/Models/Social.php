<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;
    protected $table = 'socials';
    protected $casts = [
        'social_started_at' => 'datetime',
        'social_ended_at' => 'datetime',
    ];


    public function category()
    {
        return $this->belongsTo(SocialCategory::class, 'social_category_id');
    }
}
