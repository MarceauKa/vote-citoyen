<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poll extends Model
{
    /** @var array $fillable */
    protected $fillable = [
        'name',
        'description',
    ];
    /** @var array $dates */
    protected $dates = [
        'starts_at',
        'ends_at',
    ];
    /** @var array $casts */
    protected $casts = [
        'is_valid' => 'bool',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }
}
