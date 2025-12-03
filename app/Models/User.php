<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'role'
    ];
}
