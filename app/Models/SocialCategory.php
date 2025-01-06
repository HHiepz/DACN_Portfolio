<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialCategory extends Model
{
    use HasFactory;
    protected $table = 'social_categories';

    public function socials()
    {
        return $this->hasMany(Social::class);
    }
}
