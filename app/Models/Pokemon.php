<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pokemon extends Model
{
    protected $fillable =
    [
        'name',
        'type',
        'power',
        'image',
        'coach_id'
    ];

    public function coach(): BelongsTo
    {
        return $this->belongsTo(Coach::class);
    }
}
