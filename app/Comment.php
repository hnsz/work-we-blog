<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class Comment extends Model 
{
    use SoftDeletes;
        protected $fillable = [
        'title', 'body'
    ];
    public function threadstarter()
    {
         return $this->morphOne('App\Threadstarter', 'replyable')->withDefault();
    }

    public function commentthread()
    {
        return $this->belongsTo('App\Commentthread');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
