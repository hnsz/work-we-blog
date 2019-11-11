<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Comment;
use \App\CommentThread;


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
        return $this->belongsTo('\App\CommentThread')->withDefault();
    }
    public function reply(Comment $comment)
    {
        $comment->commentThread()->associate($this->commentThread);

    }
    // Has Many Through Thread
    // public function replies( )
    // {
    //    return $this->hasMany('App\Comment');
    // }
}
