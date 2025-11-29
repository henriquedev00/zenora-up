<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $hidden = ['password'];

    protected $fillable = ['first_name', 'full_name', 'email', 'password', 'administrator', 'active'];

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
            'password' => 'hashed',
            'administrator' => 'boolean'
        ];
    }
}
