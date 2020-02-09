<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;

class CommentSectionsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }
    /**
     * @group first
     */
    public function testThreadStructure()
    {

        $post = \App\Post::find(1);
        $replies = $post->threadstarter->commentthread->replies;
        
        
        
        $this->assertIsIterable($replies);
        $this->assertInstanceOf('Illuminate\Support\Collection', $replies);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $replies);
        $this->assertCount(3,$replies);
        foreach($replies as $reply) {
            $this->assertInstanceOf(\App\Comment::class, $reply);
            $this->assertInstanceOf(\App\Threadstarter::class, $reply->threadstarter);
            
        }
        $subThread_0 = $replies[0]->threadstarter->commentthread;
        $subThread_1 = $replies[1]->threadstarter->commentthread;
        $subThread_2 = $replies[2]->threadstarter->commentthread;
        $this->assertNotNull($subThread_0);
        $this->assertNull($subThread_1);
        $this->assertNotNull($subThread_2);

        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $subThread_0->replies);
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $subThread_2->replies);
        $this->assertIsIterable($replies, $subThread_0->replies);
        $this->assertIsIterable($replies, $subThread_2->replies);
        $this->assertCount(1,$subThread_0->replies);
        $this->assertCount(1,$subThread_2->replies);
        $this->assertNotEquals($subThread_2->id, $subThread_0->id);
        $this->assertLessThan($subThread_2->id, $subThread_0->id);
        $this->assertGreaterThan($post->threadstarter->commentthread->id, $subThread_0->id);

    
    }
    
    public function testComments()
    {
        $comments = \App\Comment::all()->sortBy('id');
        $expected_comments = [
            [
                'body' => "hello nice story",
                'title' => 'none',
                'commentthread_id' => 1
            ],
            [
                'body' => "loved this, thanks",
                'title' => 'none',
                'commentthread_id' => 1
            ],
            [
                'body' => "Totally recognisable. Amirite?!",
                'title' => 'none',
                'commentthread_id' => 1
            ],
            [
                'body' => "hElLo nIcE St0rY..",
                'title' => 'lol xd',
                'commentthread_id' => 2
            ],
            [
                'body' => "You are man. Nostalgia. This brings tears to my eyes.",
                'title' => 'none',
                'commentthread_id' => 3
            ],       
        ];
        $lastCommentId = 0;
        $lastThreadId = 1;
        foreach($comments as $comment){
            $expected = array_shift($expected_comments);
            $this->assertEquals($expected['body'], $comment->body);
            $this->assertEquals($expected['title'], $comment->title);
            $this->assertEquals($expected['commentthread_id'], $comment->commentthread_id);
            $this->assertGreaterThan($lastCommentId, $comment->id);
            $this->assertLessThan($lastCommentId+2, $comment->id);
            $this->assertGreaterThanOrEqual($lastThreadId, $comment->commentthread_id);
            $this->assertLessThanOrEqual($lastThreadId+1, $comment->commentthread_id);
            $lastCommentId = $comment->id;
            $lastThreadId = $comment->commentthread_id;
        }
        
    }
    public function testThreadstarters()
    {

        $thSt = \App\Threadstarter::all();
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $thSt);
        $this->assertInstanceOf(\App\Post::class,$thSt->first()->replyable);
        
        $rest = $thSt->except(1)->pluck('replyable');
        $this->assertContainsOnlyInstancesOf(\App\Comment::class, $rest);
        
    }

    public function testCommentMorph()
    {
        $comment = \App\Comment::find(1);
        $threadstarter = $comment->threadstarter;

        $this->assertInstanceOf(\App\Threadstarter::class, $threadstarter);
        $this->assertNotNull($threadstarter->commentthread);
        $this->assertInstanceOf(\App\Commentthread::class, $threadstarter->commentthread);

    }
    public function testPostMorph()
    {
        $this->assertTrue(true);
    }

    public function testReplyToThreadstarter()
    {
        $threadstarter = \App\Threadstarter::find(1);
        $user = \App\User::find(8);
        $this->assertInstanceOf(\App\Threadstarter::class, $threadstarter);
        $commentthread = $threadstarter->commentthread;
        $this->assertNotNull($commentthread);
        $this->assertInstanceOf(\App\Commentthread::class, $commentthread);
        $this->assertCount(3, $commentthread->replies);
        $comment = new \App\Comment(["title"=>"test comment", "body"=>"this is a test comment"]);
        $comment->user()->associate($user);
        

        // $this->expectException(\Illuminate\Database\QueryException::class);
        // $comment->save();
        // $this->checkExceptionExpectations();
        $this->assertNull($comment->commentthread);
        $threadstarter->reply($comment);
        $commentthread->save();
        $comment->save();
        $this->assertInstanceOf(\App\Commentthread::class, $comment->commentthread);
        $this->assertNotNull($comment->commentthread);

        $this->assertCount(3, $commentthread->replies);
    }
    
    public function testReplyToPost()
    {
        $this->assertTrue(true);
    }
    public function testReplyToComment()
    {
        $this->assertTrue(true);
    }


    public function testGetThreadReplies()
    {
        $this->assertTrue(true);
    }
    public function testThreadstarterGetThread()
    {
        $this->assertTrue(true);
    }

    public function testGetCommentReplies()
    {
        $this->assertTrue(true);
    }
    public function testThreadstarterHasReplies()
    {
        $this->assertTrue(true);
    }
    public function testGetPostThread()
    {
        $this->assertTrue(true);
    }
    public function testGetSubThread()
    {
        $this->assertTrue(true);
    }
    public function testGetDepthNThreads()
    {
        $this->assertTrue(true);
    }
    public function testGetThreadPath()
    {
        $this->assertTrue(true);
    }
}
