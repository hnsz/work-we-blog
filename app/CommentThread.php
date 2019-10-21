<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentThread extends Model
{
    protected $fillable = [ 
        'thread_starter_id'
    ];

    public function threadStarter()
    {
        return $this->belongsTo('App\ThreadStarter');
    }
    public function replies()
    {
        return $this->hasMany('App\Comment');
    }
}

