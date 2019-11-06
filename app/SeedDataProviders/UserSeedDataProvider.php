<?php
namespace App\SeedDataProviders;

use App\Contracts\SeedDataProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Cache;
 
class UserSeedDataProvider implements SeedDataProvider
{
    public $rngSeed;
    private $data;
    private static $cache;

    public function  __construct(\Faker\Generator $fakerGen, $randomSeed=null)
    {
        
        if(is_null($randomSeed)) {
            $randomSeed = base64_encode(random_bytes(10));
        }
        $this->rngSeed = $randomSeed;
        $fakerGen->seed($randomSeed);
        $this->faker = $fakerGen;
        $this->fakerGen = $fakerGen;

        if(self::$cache) {
            return new CachedSeedDataProvider(self::$cache, $this);
        }
    }

    private function generator ($faker) {
        for($i=0; $i<10; $i++) {
                    yield  [
                        "name" => $faker->username,
                        "email" => $faker->email,
                        "password" => "baddpassword123",
                        "created_at" => $faker->dateTimeBetween($startDate = '-2 year', $enddate ='now'),
                    ];
                }
       
            

    }
    public function json()
    {
        return json_encode($this->generator($this->faker));
    }

    public function get()
    {        
        return $this->generator($this->faker);
        
    }

}
