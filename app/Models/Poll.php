<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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
    /** @var array $appends */
    protected $appends = [
        'url',
        'is_ended',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function getUrlAttribute(): string
    {
        $name = $this->is_valid == 0 ? 'proposal.show' : 'poll.show';

        return route($name, [$this->id, str_slug($this->name)]);
    }

    public function getIsEndedAttribute(): bool
    {
        return Carbon::now()->gte($this->attributes['ends_at']);
    }

    public function scopeIsEnded(Builder $query): void
    {
        $now = Carbon::now()->toDateTimeString();
        $query->where('ends_at', '<', $now);
    }

    public function scopeIsNotEnded(Builder $query): void
    {
        $query->where(function ($query) {
            $now = Carbon::now()->toDateTimeString();
            $query->where('starts_at', '<=', $now)->where('ends_at', '>=', $now);
        });
    }

    public function scopeIsValid(Builder $query): void
    {
        $query->where('is_valid', '=', 1);
    }

    public function scopeIsNotValid(Builder $query): void
    {
        $query->where('is_valid', '=', 0);
    }
}
