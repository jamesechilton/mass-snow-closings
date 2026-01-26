<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $fillable = ['name', 'slug', 'has_video'];

    protected $casts = [
        'has_video' => 'boolean',
    ];

    public function closures()
    {
        return $this->hasMany(Closure::class);
    }

    public function activeClosures()
    {
        return $this->hasMany(Closure::class)->where('is_active', true);
    }
}
