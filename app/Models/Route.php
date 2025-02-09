<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Route extends Model
{
    use HasFactory;

    protected $fillable = [
        'userid', 'latitude', 'longitude', 'last_lat', 'last_long', 'time_stamps', 'directions', 'distance', 'info'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userid', 'nik');
    }

    public function waypoints(): HasMany
    {
        return $this->hasMany(Waypoint::class, 'routeid', 'id');
    }
}
