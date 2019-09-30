<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title', 'body', 'created_at', 'published_at'
    ];
    public function commentthread()
    {
        return $this->morphOne('App\CommentThread', 'replyable');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    protected $attributes = [
        'published_at' => null,
    ];
}
