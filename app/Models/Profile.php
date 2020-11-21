<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'bio',
        'address',
        'primary_phone',
        'secondary_phone',
        'facebook',
        'instagram',
        'linkedin',
        'github',
        'youtube',
    ];

    public function getImageAttribute($image)
    {
        return asset($image);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
