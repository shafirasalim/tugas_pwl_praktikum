<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'npm';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'npm',
        'username',
        'first_name',
        'last_name',
        'email',
        'password'
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class, 'user_npm', 'npm');
    }
}