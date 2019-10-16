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
        /**
         * 
         *
         *      Part _0 / Post : Replyable 
         * 
         *  run UC { I, a = 01, b on a = 01b, a after a = 02,   }
         * I:  u_0, u_1; Ia: u_0a0 -> u_0, u_0a1; Ib: u_1b0 -> u_1b1; 
         * 
        **  _0 => basic
        
        *   Precondition:
        *                                                                _
        *                    User:A exists                                |--{[UseCase//Create Post]}
        *                    Post:A exists and it belongs to User:A     __|
        *   
        ** Start with User_0
        ** create Post_0 on User_0
        ** Pull the Post into the commentsection context(in the mind's eye): 
        ** Instantiate the replyable relation, instantiate ThreadStarter
        ** Get the replyid from threadstarter
        ** save


        **   
        *       use case (I)  Run { 0*, 0*a, 0a*n => 1a, 1a*n => 2a }

        
        **  (*) Main Scenario

        *       Comment  (reply to Post )
        *       
        *       Start with User_1
        *       create Comment_0 on User_1
        *       
        *       Find the ThreadStarter By ReplyId 
        *       
        *           ThreadStarter::commentThread        (reply(id) -> CommentThread )
        *       
        *       CommentThread->attach(Comment) 
        *               save

        **  (*a)      =>  Scenario Extension

        *       Comment Reply to Previous Comment
        *       
        *       Start with User _n
        *       create Comment on User _n
        *       
        *       Find the ThreadStarter By ReplyId 
        *       
        *           ThreadStarter::commentThread        (reply(id) -> CommentThread )
        *       
        *       CommentThread->attach(Comment) 
        *               save
        
        **  (*n)      =>  Repeat Use Case

        *       Main Scenario (again)
        *       
        *       Start with User_n
        *       create Comment on User_n
        *       
        *       Find the ThreadStarter By ReplyId 
        *       
        *           ThreadStarter::commentThread        (reply(id) -> CommentThread )
        *       
        *       CommentThread->attach(Comment) 
        *               save
        ***/


            
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


                
            
        // $thread = new App\CommentThread(App\Post::find(1));
        // $thread->reply(new App\Comment($comment));

    }
    function before()
    {
        $users = \App\User::all();
        
        
        

    }

}
