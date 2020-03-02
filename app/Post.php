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
    public function threadstarter()
    {
        return $this->morphOne('App\Threadstarter', 'replyable')->withDefault();
    }
    public function getBodyAttribute()
    {
        $tags = $this->hashtags->pluck('tag')->toArray();
        $links = $this->hashtags->pluck('link')->toArray();
        
        return  str_replace($tags, $links, "If you like #hsahtags then you will #love this!");
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function hashtags()
    {
        return $this->belongsToMany('App\Hashtag', 'post_hashtag')->using('App\PostHashtag');
    }
    protected $attributes = [
        'published_at' => null,
    ];

}
