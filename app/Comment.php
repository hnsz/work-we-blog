<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model 
{
    use SoftDeletes;
        protected $fillable = [
        'minor_title', 'body'
    ];
    public function commentthread()
    {
        return $this->morphOne('App\CommentThread', 'replyable');
     }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
