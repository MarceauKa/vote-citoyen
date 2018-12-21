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
        'is_proposed',
        'is_pending',
        'is_current',
        'is_ended',
        'has_dates',
    ];
    /** @var string DATE_FORM_FORMAT */
    const DATE_FORM_FORMAT = 'd/m/Y H:i';

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function supports(): HasMany
    {
        return $this->hasMany(Support::class);
    }

    public function getUrlAttribute(): string
    {
        return route('poll.show', [
            $this->id,
            str_slug($this->name)
        ]);
    }

    public function getStatusNameAttribute(): string
    {
        if ($this->is_ended) {
            return __('Vote terminé');
        } else if ($this->is_current) {
            return __('Vote en cours');
        } else if ($this->is_pending) {
            return __('Vote à venir');
        } else {
            return __('Vote proposé');
        }
    }

    public function getIsEndedAttribute(): bool
    {
        return $this->has_dates
            && Carbon::now()->gte($this->ends_at)
            && $this->is_valid == 1;
    }

    public function getIsPendingAttribute(): bool
    {
        return $this->has_dates
            && Carbon::now()->lt($this->starts_at)
            && Carbon::now()->lt($this->ends_at)
            && $this->is_valid == 1;
    }

    public function getIsCurrentAttribute(): bool
    {
        return $this->has_dates
            && Carbon::now()->gte($this->starts_at)
            && Carbon::now()->lte($this->ends_at)
            && $this->is_valid == 1;
    }

    public function getIsProposedAttribute(): bool
    {
        return $this->is_valid == 1
            && ! $this->has_dates;
    }

    public function getHasDatesAttribute(): bool
    {
        return ! empty($this->starts_at)
            && ! empty($this->ends_at);
    }

    public function scopeUserHasNoVote(Builder $query, User $user): Builder
    {
        return $query->whereDoesntHave('answers', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        });
    }

    public function scopeUserHasNoSupport(Builder $query, User $user): Builder
    {
        return $query->whereDoesntHave('supports', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        });
    }

    public function scopeIsEnded(Builder $query): void
    {
        $now = Carbon::now()->toDateTimeString();

        $query->hasDates()
            ->where('ends_at', '<', $now)
            ->where('is_valid', '=', 1);
    }

    public function scopeIsCurrent(Builder $query): void
    {
        $now = Carbon::now()->toDateTimeString();

        $query->hasDates()
            ->where('starts_at', '<', $now)
            ->where('ends_at', '>', $now)
            ->where('is_valid', '=', 1);
    }

    public function scopeIsPending(Builder $query): void
    {
        $now = Carbon::now()->toDateTimeString();

        $query->hasDates()
            ->where('starts_at', '>', $now)
            ->where('ends_at', '>', $now)
            ->where('is_valid', '=', 1);
    }

    public function scopeIsProposed(Builder $query): void
    {
        $query->where('is_valid', '=', 1)
            ->whereNull('starts_at')
            ->whereNull('ends_at');
    }

    public function scopeHasDates(Builder $query): void
    {
        $query->whereNotNull('starts_at')
            ->whereNotNull('ends_at');
    }
}
