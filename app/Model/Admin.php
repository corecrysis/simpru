<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $table = 'admins';

    protected $fillable = [
        'name', 'email', 'password', 'identifier', 'keanggotaan', 'no_hp', 'status_admin'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}