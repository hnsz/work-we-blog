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
            $comment = "Hello man. Nice Article.";
            $thread->replies()->create(['body' => $comment]);
            var_dump(array_keys((array)$thread));
            
        // $thread = new App\CommentThread(App\Post::find(1));
        // $thread->reply(new App\Comment($comment));

    }
}
