<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Comment extends Model
{
    use SoftDeletes;
        protected $fillable = [
        'minor_title', 'body'
    ];
    public function commentThread()
    {
        return $this->belongsTo('App\CommentThread');
    }
     public function threadStarter()
     {
         return $this->morphOne('App\ThreadStarter', 'replyable');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
