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
     * 
     * @return void
     * @dataProvider commentInitListProvider
     */
    public function testInstantiate ($title, $body)
    {
        $init = [   'minor_title' => $title,
                    'body' => $body,
                ];
        $comment = new \App\Comment($init);
        $this->assertInstanceOf(\App\Comment::class, $comment);
        $this->assertEquals($title, $comment->minor_title);
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
        $replyable = new \App\Post(["title"=>"Anything that starts with too is bad.","body"=>"As the title said, discuss.."]);
        //$this->assertNull($replyable->threadstarter);
        $starter =  $replyable->threadStarter;
        $this->assertInstanceOf(\App\ThreadStarter::class, $starter);
        
        $threadStarter = new \App\ThreadStarter();
        /**Should always return a thread (withDefault) */
        $thread = $threadStarter->commentThread;
        $this->assertInstanceOf(\App\CommentThread::class, $thread);
        

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
        /*
    public function testReplyToUserInContext($sender,$receiver, $context)
    {
        $this->assertTrue(true);
    }
    public function testReplyToComment($comment)
    {
        $this->assertTrue(true);
    }
    public function testReplyToPost($comment)
    {
        $this->assertTrue(true);
    }
    public function testReplyToThreadStarter($comment)
    {
        $this->assertTrue(true);
    }
    public function testThreadHasManyThoughStarter()
    {
        $this->assertTrue(true);

    }
    */
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
