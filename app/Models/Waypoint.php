<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Waypoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'routeid', 'latitude', 'longitude', 'sequence'
    ];

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class, 'routeid', 'id');
    }
}
