<?php

namespace App\Providers;

use App\Http\Requests\CommentReply;
use Illuminate\Support\ServiceProvider;

class RequestProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->instance(CommentReply::class, new CommentReply());
    }
    public function provides()
    {

        return [
            CommentReply::class,
        ];
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
