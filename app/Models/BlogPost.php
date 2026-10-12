<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'user_id',
        'post_title',
        'post_slug',
        'photo',
        'post_tags',
        'post_description',
    ];
    public function author()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}
