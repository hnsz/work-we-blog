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
        $posts = require 'dataproviders/users.provider.php';

        foreach($dummy as $data) {
            $initlist = $data;
            
            $post = App\User::find(1)->posts()->create($initlist);
            
                    
            
            

            $post->save();
        }
        $this->call(CommentThreadSeeder::class);
    }

}
