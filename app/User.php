<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Ramsey\Uuid\Uuid;
class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    protected $primaryKey = "id";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'id' => 'uuid',
        'email' => 'string',
        'password' => 'string',
        'isAdmin' => 'boolean',
        'remember_token' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
