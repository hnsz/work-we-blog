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
        $init = [   'title' => $title,
                    'body' => $body,
                ];
        $comment = new \App\Comment($init);
        $this->assertInstanceOf(\App\Comment::class, $comment);
        $this->assertEquals($title, $comment->title);
        $this->assertEquals($body, $comment->body);
    }
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
    /** @dataProvider provideComment */
    public function testReplyToComment($comment)
    {
        $this->assertTrue(true);
    }
    /** @dataProvider provideComment */
    public function testReplyToPost($comment)
    {
        $this->assertTrue(true);
    }
    /** @dataProvider provideComment */
    public function testReplyToThreadStarter($comment)
    {
        $this->assertTrue(true);
    }
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
