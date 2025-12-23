<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $hidden = ['password'];

    protected $fillable = ['full_name', 'email', 'password', 'profile_image', 'administrator', 'active'];

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
            'password' => 'hashed',
            'administrator' => 'boolean'
        ];
    }

    protected function name(): Attribute
    {
        return Attribute::make(fn (null $value, array $attributes) => strtok($attributes['full_name'], ' '));
    }

    public function professional(): HasOne
    {
        return $this->hasOne(Professional::class);
    }
}
