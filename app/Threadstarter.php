<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Comment;
use \App\Commentthread;


class Threadstarter extends Model
{
    protected $fillable = [

    ];
    public function replyable()
    {
        return $this->morphTo();
    }
    public function commentthread()
    {
        return $this->hasOne('\App\Commentthread');
    }
    public function reply(Comment $comment)
    {
        $comment->commentthread()->associate($this->commentthread);

    }
    // Has Many Through Thread
    // public function replies( )
    // {
    //    return $this->hasMany('App\Comment');
    // }
}
