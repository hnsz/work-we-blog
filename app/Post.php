<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    protected $attributes = [
        'published_at' => null,
    ];
}
