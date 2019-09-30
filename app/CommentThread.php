<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CommentThread extends Model
{
    //
    public function replyable()
    {
        return $this->morphTo();
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
