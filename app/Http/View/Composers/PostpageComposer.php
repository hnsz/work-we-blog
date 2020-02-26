<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;


class PostpageComposer
{

    public function __construct(\Illuminate\Support\Str $message)
    {
            $this->specialMessage = $message;
    }
    public function compose(View $view)
    {
        $view->with('special', $this->specialMessage);
    }

}