<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guard = 'admin';

    protected $fillable = [
        'avatar',
        'name',
        'email',
        'password',
        'phone',
        'address',
        'website',
        'facebook_link',
        'x_link',
        'whatsapp',
        'linkedin_link',
        'instagram_link',
        'about',
        'banner'

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
