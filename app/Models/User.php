<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /** @var array $fillable */
    protected $fillable = [
        'firstname',
        'lastname',
        'birthdate',
        'postcode',
        'social_category_id',
        'gender',
        'email',
        'password',
    ];
    /** @var array $hidden */
    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
    ];
    /** @var array $dates */
    protected $dates = [
        'deleted_at',
    ];

    public function socialCategory(): BelongsTo
    {
        return $this->belongsTo(SocialCategory::class);
    }

    public function answers(): BelongsToMany
    {
        return $this->belongsToMany(Answer::class);
    }

    public function supports(): BelongsToMany
    {
        return $this->belongsToMany(Support::class);
    }

    public function getGenderNameAttribute(): string
    {
        $keys = array_keys(self::getGendersList());
        $current = $this->attributes['gender'];
        return $current && array_key_exists($current, $keys) ? self::getGendersList()[$current] : '-';
    }

    public function getFullnameAttribute(): string
    {
        return vsprintf('%s %s.', [
            $this->firstname,
            mb_substr($this->lastname, 0, 1),
        ]);
    }

    public function setFirstnameAttribute(string $value): void
    {
        $this->attributes['firstname'] = mb_convert_case($value, MB_CASE_TITLE);
    }

    public function setLastnameAttribute(string $value): void
    {
        $this->attributes['lastname'] = mb_convert_case($value, MB_CASE_TITLE);
    }

    public function setPasswordAttribute(string $value): void
    {
        $this->attributes['password'] = Hash::make($value);
        $this->attributes['api_token'] = self::generateApiToken();
    }

    public function setGenderAttribute(string $value): void
    {
        $keys = array_keys(self::getGendersList());
        $this->attributes['gender'] = array_key_exists($value, $keys) ? $value : current($keys);
    }

    static public function generateApiToken(): string
    {
        return str_random(100);
    }

    static public function getGendersList(): array
    {
        return [
            'male' => 'Homme',
            'female' => 'Femme',
            'other' => 'Autre',
        ];
    }
}
