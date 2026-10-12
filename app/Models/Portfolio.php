<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'photo',
        'service_cat_id',
        'url',
    ];
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_cat_id');
    }
}
