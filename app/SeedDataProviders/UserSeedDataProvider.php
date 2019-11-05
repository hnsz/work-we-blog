<?php
namespace App\SeedDataProviders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Cache\FileStore;
 
class UserSeedDataProvider 
{
    private $data;
    private static $cache;

    public static final function withCache(FileStore $cache)
    {
        self::$cache = $cache;
        return self;
    }
    public function  __construct(\Faker\Generator $fakerGen, $randomSeed=null)
    {
        if(is_null($randomSeed)) {
            $randomSeed = base64_encode(random_bytes(10));
        }
        $fakerGen->seed($randomSeed);
        $generator = $this->createGenerator($fakerGen);
        $this->data = iterator_to_array($generator);
    }
    private function createGenerator($faker)
    {
        for($i=0; $i<10; $i++)
        {
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
        return json_encode($this->data);
    }

    public function get()
    {
        return $this->data;
    }

}
