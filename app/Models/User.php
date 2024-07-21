<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use  HasRoles;

    const ROLE_ADMIN = 'admin';
    const ROLE_CLIENT = 'client';

    protected $fillable = [
        'name',
        'email',
        'date',
        'gender',
        'phone',
        'password'
    ];
    public function isAdmin()
    {
        return $this->hasRole('admin') ;
    }
    public function isUser()
    {
        return $this->hasRole('client');
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

}
