<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SocialCategory extends Model
{
    /** @var string $table */
    protected $table = 'social_categories';

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function subCategories(): HasMany
    {
        return $this->hasMany(SocialCategory::class, 'parent_id');
    }

    public function scopeIsParentCategory(Builder $query): void
    {
        $query->whereNull('parent_id');
    }

    public function scopeIsChildCategory(Builder $query): void
    {
        $query->whereNotNull('parent_id');
    }
}
