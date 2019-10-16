<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        $posts = require 'dataproviders/posts.provider.php';

        foreach($posts as $data) {
            $data['published_at'] = $now ;
            $initlist = $data;

            
            $post = App\User::find(1)->posts()->create($initlist);
            
                    
            
            

            $post->save();
        }
        $this->call(CommentThreadSeeder::class);
    }

}
