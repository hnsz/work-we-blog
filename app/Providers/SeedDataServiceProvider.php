<?php


namespace App\Providers;


use App\SeedDataProviders\UserSeedDataProvider;
use Illuminate\Support\ServiceProvider;


class SeedDataServiceProvider extends ServiceProvider
{

    // public $bindings = [
    //     SeedDataProvider::class => UserSeedDataProvider::class,
        
    // ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $faker = \Faker\Factory::create();
    }
}
