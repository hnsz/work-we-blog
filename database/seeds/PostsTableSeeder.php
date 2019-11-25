<?php

use Illuminate\Database\Seeder;

use Carbon\CarbonImmutable;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = require __DIR__ . '/seeddataprovider/posts.provider.php';    
        
        /** 
         *      Constraints (should be checked)
         *       3 x   user_id ,   4 x published_at, 
         *          title < 200,   post[3].user_id  == post[2].userId, post[3].timestamp >= post[2].timestamp
         *          published_at >= timestamp, post_timestamp > user_timestamp, 
         */
        $ids = \App\User::all()->random(3)->pluck('id');
        $user_id = array_combine( range(0,3),[0,1,2,2]);
        $now = CarbonImmutable::now();
        $stamps = [     $now->addMonth(-2),
                                 $now->addMonths(-3),
                                $now->addDays(-1),
                                $now->sub('22 hours 36 minutes') ];
        

                                
        $keys =['title', 'body',  'user_id',  'created_at'  , 'published_at' ];
        for($i=0; $i<4; $i++)
        {
            $toinsert[] = array_combine($keys , 
                                        [$posts[$i]['title'],
                                        $posts[$i]['body'],
                                         $ids[$user_id[$i]],
                                         $stamps[$i],$stamps[$i]]);
        }

        DB::table('posts')->insert($toinsert);

    }
}

