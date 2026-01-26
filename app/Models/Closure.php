<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Closure extends Model
{
    protected $fillable = ['town_id', 'source_text', 'status_text', 'detected_at', 'last_seen_at', 'is_active'];

    protected $casts = [
        'detected_at' => 'datetime',
        'last_seen_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function town()
    {
        return $this->belongsTo(Town::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
