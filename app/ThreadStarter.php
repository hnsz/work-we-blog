<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ThreadStarter extends Model
{
    protected $fillable = [

    ];
    public function replyable()
    {
        return $this->morphTo();
    }
    public function commentThread()
    {
        return $this->hasOne('App\CommentThread');
    }
    // Has Many Through Thread
    // public function replies( )
    // {
    //    return $this->hasMany('App\Comment');
    // }
}
