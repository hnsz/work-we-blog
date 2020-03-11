<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostComposer
{

    public function __construct(Request $request )
    {
        $this->request = $request;
    }
    public function compose(View $view)
    {
           dd("fuck  view composer + component + post->hashtags");
    }

}