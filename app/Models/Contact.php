<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'service_id',
        'description',
    ];

    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
}
