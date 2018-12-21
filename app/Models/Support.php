<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Support extends Model
{
    /** @var array $fillable */
    protected $fillable = [
        'poll_id',
        'user_id',
        'ip_address',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class);
    }

    public function scopePollAndUserAre(Builder $query, Poll $poll, User $user): Builder
    {
        return $query->where('poll_id', '=', $poll->id)->where('user_id', '=', $user->id);
    }
}
