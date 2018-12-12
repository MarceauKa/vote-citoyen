<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /** @var array $fillable */
    protected $fillable = [
        'poll_id',
        'user_id',
        'content',
        'ip_address',
    ];

    public function scopePollAndUserAre(Builder $query, Poll $poll, User $user): Builder
    {
        return $query->where('poll_id', '=', $poll->id)->where('user_id', '=', $user->id);
    }
}
