<?php


namespace App\Providers;

use App\Contracts\SeedDataProvider;
use App\SeedDataProvider\UserSeedDataProvider;
use Illuminate\Support\ServiceProvider;


class SeedDataServiceProvider extends ServiceProvider
{

    public $bindings = [
        SeedDataProvider::class => UserSeedDataProvider::class,
        
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
