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

                $this->before();
                $starter = App\Post::find(1)->threadStarter()->create();
            
                $thread = $starter->commentThread()->create(['thread_starter_id' => $starter]);
            
                $user = App\User::find(2);
                $init_list =[
                    'body' => "hello nice story",
                    'minor_title' => 'none',
                    'comment_thread_id' => $thread->id
                    ];    
                $comment = $user->comments()->create($init_list);
                
                $comment->commentThread()->associate($thread);
                
                $starter->save();
                $thread->save();
                $user->save();
                $comment->save();

                $generator = \Faker\Factory::create();
                $populator = \Faker\ORM\Propel\Populator($generator);
                $populator->addEntity();
    }
    function before()
    {
        $users = \App\User::all();
    }

}

