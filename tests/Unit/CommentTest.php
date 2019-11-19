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
     * @dataProvider commentInitListProvider
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

    }
 
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
     * threadstarter->thread->replies()->save(comment)
     */
    public function testAssociateCommentWithThread()
    {
        $this->artisan('migrate:fresh');
        $user = new \App\User(["name"=>"asd","email"=>"asdsad@dasda.nl","password"=>"asdasdas"]);
        $user->save();
        
        $replyablePost = $user->posts()->create(["title"=>"Anything that starts with 'too' is bad.",
                                        "body"=>"As the title said, discuss.."]);
                                        
        $starter = $replyablePost->threadstarter()->create();
        $thread = new \App\Commentthread();
        
        $this->assertTrue($starter->wasRecentlyCreated);
        $this->assertFalse($thread->wasRecentlyCreated);
        $starter->commentthread()->save($thread);
        $this->assertTrue($thread->wasRecentlyCreated);
        // $thread->push();
    }
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
