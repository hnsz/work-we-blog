<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $fillable = ['tag'];
    public function posts()
    {
        return $this->belongsToMany('App\Post')->using('App\PostHashtag');
    }
    public static final function tagFilter($string)
    {
        preg_match_all('/#\w+/', $string, $matches);
        $tags = collect($matches[0]);

        foreach ($tags as $tag) {
            yield new Hashtag(['tag' => $tag]);
        }
    }
    
    public function setTagAttribute($tag)
    {
        $this->attributes['tag'] = strtolower($tag);
    }
    public function getLinkAttribute()
    {
        $tag = $this->attributes['tag'];
        return "<a href='{$tag}'>{$tag}</a>";
    }
}
