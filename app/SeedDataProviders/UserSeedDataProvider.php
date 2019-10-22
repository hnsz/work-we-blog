<?php

namespace App\SeedDataProvider;
use App\Contracts\SeedDataProvider\SeedDataProvider;

class UserSeedDataProvider implements SeedDataProvider
{
    private $generator = NULL;

    public function  __construct()
    {
        $faker =  Faker\Factory::create();
        $randomSeed= base64_encode(random_bytes(100));
        $faker->seed($randomSeed);

        $this->generator = $this->createGenerator($faker);
    }
    public function createGenerator($faker)
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
    public function next()
    {
        return $this->generator();
    }
    public function empty()
    {
        return (empty($this->generator));
    }
}
