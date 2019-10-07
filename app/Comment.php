<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Comment extends Model 
{
    use SoftDeletes;
        protected $fillable = [
        'minor_title', 'body', 'user_id', 'comment_thread_id'
    ];

    public function threadStarter()
    {
         return $this->morphOne('App\ThreadStarter', 'replyable');
    }

    public function commentThread()
    {
        return $this->belongsTo('App\CommentThread');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
