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
        /**
         * CommentSection(ThreadStarter Post)
         * threadStarter->save()
         * Comment form
         * Request Controller
         * 
         * commentSectionController
         * threadStarter->reply(comment)
         *  commentThread= 
         *      threadStarter->hasCommentThread()
         *          or
         *      threadStarter->commentThread->create()
         *  commentThread->attach(comment)
         * 
         * 
         */
     
            /**
             * if a commentsection is enabled for this post
             *       create threadstarter 
             * 
               */ 
        $starter = App\Post::find(1)->threadStarter()->create();

        $thread = $starter->commentThread()->create();

            
        $users = App\User::all()->where('id','!=',1)->random(5);
        
        $replies = [
            [
            'current_stage' => [
                'body' => "hello nice story",
                'minor_title' => 'none',
                'comment_thread_id' => $thread->id
                ],
            'next_stage' => [
                    'body' => "hElLo nIcE St0rY..",
                    'minor_title' => 'lol xd',
                    'comment_thread_id' => $thread->id
                ],
            ],
            [
            'current_stage' => [
                'body' => "loved this, thanks",
                'minor_title' => 'none',
                'comment_thread_id' => $thread->id
                ],
            'next_stage' => [],
            ],
            [
            'current_stage' => [
                'body' => "Totally recognisable. Amirite?!",
                'minor_title' => 'none',
                'comment_thread_id' => $thread->id
                ],
            'next_stage' => [
                'body' => "You are man. Nostalgia. Brings tears to my eyes.",
                'minor_title' => 'none',
                'comment_thread_id' => $thread->id
                ],                 
            ],
        
        ];


        while($reply = array_pop($replies)) {
            $init_list = $reply['current_stage'];
            $user = $users->pop();

            $comment = $user->comments()->create($init_list);
            $comment->commentThread()->associate($thread);
            $threadStarter_next_stage = $comment->threadStarter()->create();
            $comment->save();
            $user->save();
            
            if (!empty($reply['next_stage'])) {
                $thread_next_stage = $threadStarter_next_stage->commentThread()->create();
                $thread_next_stage->save();
                $reply['next_stage']['comment_thread_id'] = $thread_next_stage->id;
                $next['current_stage'] = $reply['next_stage'];
                $next['next_stage'] = [];
                array_unshift($replies, $next);
            }
            
        }
        
                
        
                
        $starter->save();
        $thread->save();
        
        
    
                // $generator = \Faker\Factory::create();
                // $populator = \Faker\ORM\Propel\Populator($generator);
                // $populator->addEntity();
    }

}

