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
        $tags =   [ "linux", 
                        "parcelhero", 
                        "europe", 
                        "cybercrime",
                        "technology",
                        "hackercommunity"];

        
           $now =  CarbonImmutable::now();
           $insdata = collect($tags)
           ->map(fn($tag) => ['tag' => $tag, 'created_at' => $now]);
        
        DB::table('hashtags')->insert($insdata->toArray());

    }
}
