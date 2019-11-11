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
/**
 * @delete
 * DELETE THIS COMMENT
 * 'user_id', 'comme
 * nt_thread_id'
 *  'user_id' => $user_id,             
 *   'comment_thread_id' => $comment_thread_id];
 * Dit kan niet in de constructor
 * Je maakt een comment aan op een user
 * Je associeert een comment met een thread.
 * deze twee id's wil je alleen zelf instellen
 * wanneer je een database insert doet
 */
    public function threadStarter()
    {
         return $this->morphOne('App\ThreadStarter', 'replyable')->withDefault();
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
