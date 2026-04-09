<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    
    protected $primaryKey = 'npm';
    public $incrementing = false;
    
    protected $fillable = [
        'npm', 'username', 'first_name', 'last_name', 'email', 'password',
    ];
    
    protected $hidden = [
        'password',

    ];
    
    public $timestamps = true;  // ← Pastikan true karena users punya created_at & updated_at
}