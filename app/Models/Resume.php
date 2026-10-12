<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'resume_cat',
        'resume_title',
        'institution',
        'from_year',
        'to_year',
    ];
}
