<?php


$faker =  Faker\Factory::create();
$seed= base64_encode(random_bytes(10));
$faker->seed($seed);



function usergen($faker)
{
    for($i=0; $i<10; $i++)
    {
        yield  [
            "name" => $faker->name,
            "email" => $faker->email,
            "password" => Hash::make("welkom01"),
            "created_at" => $faker->dateTimeBetween($startDate = '-2 year', $enddate ='now'),
        ];
    }
};
$gen = usergen($faker);
return $gen;
// foreach($gen as $user){
//     $users[] =  $user;
// }

// return $users;