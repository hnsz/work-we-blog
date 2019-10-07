<?php

use Illuminate\Database\Seeder;

class CommentThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            
            $starter = App\Post::find(1)->threadStarter()->create();
            $thread= $starter->commentThread()->create(['thread_starter_id' => $starter]);
            
                $user = App\User::find(2);
                $comment =[
                    'body' => "hello nice story"
                    
                    ];    
                $reply = new App\Comment();
                $reply->user=$user;
                $thread->replies->associate($reply);



                // $thread->replies(); //Comment
                
            print_r((array)$reply);
            
        // $thread = new App\CommentThread(App\Post::find(1));
        // $thread->reply(new App\Comment($comment));

    }
}
