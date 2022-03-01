<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'author',
        'content',
        'slug',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getRouteKeyName()
        {
            return 'slug';
        }
    
}
