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
        $starter = App\Post::find(1)->threadstarter()->create();

        $thread = $starter->commentthread()->create();

        $starter->save();
        $thread->save();    
        $users = App\User::all()->where('id','!=',1)->random(5);
        
        $replies = [
            [
            'current_stage' => [
                'body' => "hello nice story",
                'title' => 'none',
                'commentthread_id' => $thread->id
                ],
            'next_stage' => [
                    'body' => "hElLo nIcE St0rY..",
                    'title' => 'lol xd',
                    'commentthread_id' => -1
                ],
            ],
            [
            'current_stage' => [
                'body' => "loved this, thanks",
                'title' => 'none',
                'commentthread_id' => $thread->id
                ],
            'next_stage' => [],
            ],
            [
            'current_stage' => [
                'body' => "Totally recognisable. Amirite?!",
                'title' => 'none',
                'commentthread_id' => $thread->id
                ],
            'next_stage' => [
                'body' => "You are man. Nostalgia. This brings tears to my eyes.",
                'title' => 'none',
                'commentthread_id' => -1
                ],                 
            ],
        
        ];


        while($reply = array_shift($replies)) {
            $init_list = $reply['current_stage'];
            $user = $users->pop();

            $comment = $user->comments()->create($init_list);
            $threadstarter_next_stage = $comment->threadstarter()->create();
            $comment->save();
            $user->save();
            
            if (!empty($reply['next_stage'])) {
                $thread_next_stage = $threadstarter_next_stage->commentthread()->create();
                $threadstarter_next_stage->save();
                $thread_next_stage->save();
                $reply['next_stage']['commentthread_id'] = $thread_next_stage->id;
                $next['current_stage'] = $reply['next_stage'];
                $next['next_stage'] = [];
                /**
                 * and further
                 * stage-2 => next_stage
                 * stage-n => stage-(n-1)
                 */
                array_push($replies, $next);
            }
            
        }
    }

}

