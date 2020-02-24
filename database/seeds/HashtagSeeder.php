<?php

use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;

class HashtagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = array_fill(0, 5, CarbonImmutable::now());

       $tags = [ "linux", 
        "parcelhero", 
        "europe", 
        "cybercrime",
        "technology",
        "hackercommunity",
        ];
        $to_insert = array_map(null, $tags, $now);
        DB::table('hashtags')->insert($to_insert);

    }
}
