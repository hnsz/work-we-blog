<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @group comment
 */
class CommentTest extends TestCase
{

    /**
     * @return void
     * @dataProvider commentInitListProvider
     */
    public function testInstantiate ($title, $body)
    {
        $init = [   'title' => $title,
                    'body' => $body,
                ];
        $comment = new \App\Comment($init);
        $this->assertInstanceOf(\App\Comment::class, $comment);
        $this->assertEquals($title, $comment->title);
        $this->assertEquals($body, $comment->body);
    }
    /**
     * comment create 
     * user->comments()->save(comment)
     *
     * commment threadstarter()
     *      morphOne App\ThreadStarter replyable
     * 
     * comment replies()
     *      morphOne App\ThreadStarter replyable 
     *  or
     *      morphOne App\CommentThread replyable
     *  or
     *      morphOne App\Replies replyable
     * Dilemma being: reply to comment, reply to thread, reply as relation controlled outside of model 
     *  or as action on the model itself where is curates its own thread/replies
     *  or does it delegate to a thread
     *      the context switch happens here
     *      is it transparent or not?
     *      the moment you reply to a comment the context changes
     *      the comment or post changes into a threadstarter 
     *      the comment in reply to it becomes the reply/replier
     *      The morph functionality is not meant for this context switch. It is meant to facilitate a different interface on the model.
     *      A context switch is something that should be clear in the code. And it should be a sort of contract that sets the scene and casts the objects
     *      in different roles. The roles are defined by the interfaces. The context created or requested by the controller and the performed by .. another controller?
     * 
     * threadstarter 
     *      belongsto commentthread withdefault
     * 
     * threadstarter->thread->replies()->save(comment)
     */
    public function testAssociateCommentWithThread()
    {
        /** you save any replyable to
         *  or create it on
         *  an existing user 
         * if you don't you dont have an id
         * */

        /**
         * An object only has a foreign key it is created or withDefault
         * on another object. That object must have been saved already
         * 
         * You can save an object without a foreign key on a relation 
         * and it will receive the foreign key;
         * 
         * 
         * you can get a default 
         * but you must have saved the
         * 
         */

        $this->artisan('migrate:fresh');
        $user = new \App\User(["name"=>"asd","email"=>"asdsad@aswdsadasda.nl","password"=>"asdasdas"]);
        $user->save();
        
        $replyablePost = $user->posts()->create(["title"=>"Anything that starts with 'too' is bad.",
                                        "body"=>"As the title said, discuss.."]);
        
        
        $starter = $replyablePost->threadstarter;
        $this->assertFalse($starter->wasRecentlyCreated);
        
        $thread = \App\Commentthread::create();
        $thread->threadstarter()->save($starter);

        $this->assertTrue($thread->wasRecentlyCreated);
        $this->assertTrue($starter->wasRecentlyCreated);
        


        
        


        
        
        // $thread->push();
        
        
    }
    /**
     * hasOneThrough
     *    is return threadstarter->thread
     */


        /**
        * Could say a comment is between two users.
        * Like a message.
        * But in a specific context
        *
        */
    public function testReplyToUserInContext($sender=null,$receiver=null, $context=null)
    {
        $this->assertTrue(true);
    }
    // /** @dataProvider provideComment */
    // public function testReplyToComment($comment)
    // {
    //     $this->assertTrue(true);
    // }
    // /** @dataProvider provideComment */
    // public function testReplyToPost($comment)
    // {
    //     $this->assertTrue(true);
    // }
    // /** @dataProvider provideComment */
    // public function testReplyToThreadStarter($comment)
    // {
    //     $this->assertTrue(true);
    // }
    public function testThreadHasManyThoughStarter()
    {
        $this->assertTrue(true);

    }

    /**
     * @return \App\Comment
     */
    public function provideComment($title='sporks', $body='asdas ')
    {
        return new \App\Comment([$title, $body]);
    }
    /**
     * return Array
     */
    public function commentInitListProvider()
    {
        $data = [ 
            ["OP sucks",
            "This is the most ill-informed story I have ever read. what is this website coming to.",
            ],
        ];
        return $data;
    }
    
}
