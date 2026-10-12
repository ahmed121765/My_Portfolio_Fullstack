<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    protected $fillable = [
        'phone',
        'email',
        'address',
        'logo',
        'footer_note',
    ];
}
