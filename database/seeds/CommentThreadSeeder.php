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
         * 
         *
               Part A / Post : Replyable 

                 Start with UserA 
                create Post on UserA
                    Pull the Post into the commentsection context(in the mind's eye): 
                    Instantiate the replyable relation, instantiate ThreadStarter
                                Get the replyid from threadstarter
                    save
                Part B / Comment  (reply to previous Post )
                
                Start with User B
                create Comment on User B
                
                Find the ThreadStarter By ReplyId 
                
                    ThreadStarter::commentThread        (reply(id) -> CommentThread )
                
                CommentThread->attach(Comment) 
                        save
         **/



            $starter = App\Post::find(1)->threadStarter()->create();
            
            $thread = $starter->commentThread()->create(['thread_starter_id' => $starter]);
            
                $user = App\User::find(2);
                $init_list =[
                    'body' => "hello nice story",
                    'minor_title' => 'none',
                    'comment_thread_id' => $thread->id
                    ];    
                $comment = $user->comments()->create($init_list);
                // $comment->user=$user;
                $comment->commentThread()->associate($thread);
                
                $starter->save();
                $thread->save();
                $user->save();
                $comment->save();


                
            // print_r($user);
            print_r($comment);
            // print_r($starter);
            // print_r($thread);
            
            
            
        // $thread = new App\CommentThread(App\Post::find(1));
        // $thread->reply(new App\Comment($comment));

    }

}
