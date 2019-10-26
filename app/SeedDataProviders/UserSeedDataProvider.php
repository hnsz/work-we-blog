<?php
namespace App\SeedDataProviders;
use Illuminate\Support\Facades\Hash;

 
class UserSeedDataProvider 
{
    private $generator = NULL;

    public function  __construct(\Faker\Generator $fakerGen)
    {
        $randomSeed = base64_encode(random_bytes(100));
        $fakerGen->seed($randomSeed);
        $this->generator = $this->createGenerator($fakerGen);
    }
    private function createGenerator($faker)
    {
        for($i=0; $i<10; $i++)
        {
            yield  [
                "name" => $faker->username,
                "email" => $faker->email,
                "password" => Hash::make("welkom01"),
                "created_at" => $faker->dateTimeBetween($startDate = '-2 year', $enddate ='now'),
            ];
        }
    }
    public function get()
    {
        $data = [];
        foreach($this->generator as $record) {
            $data[] = $record;
        }
        return $data;
    }

}
