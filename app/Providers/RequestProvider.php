<?php

namespace App\Providers;

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
        $this->app->when(\App\Http\Controllers\ReplyableController::class)
                ->needs(\App\Http\Requests\CommentReply::class)
                ->give(new \App\Http\Requests\CommentReply());
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
