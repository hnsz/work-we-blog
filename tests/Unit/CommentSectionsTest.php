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
        $replies = $post->threadStarter->commentThread->replies;
        
        
        
        $this->assertIsIterable($replies);
        $this->assertInstanceOf('Illuminate\Support\Collection', $replies);
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $replies);
        $this->assertCount(3,$replies);
        foreach($replies as $reply) {
            $this->assertInstanceOf(\App\Comment::class, $reply);
            $this->assertInstanceOf(\App\ThreadStarter::class, $reply->threadStarter);
            
        }
        $subThread_0 = $replies[0]->threadStarter->commentThread;
        $subThread_1 = $replies[1]->threadStarter->commentThread;
        $subThread_2 = $replies[2]->threadStarter->commentThread;
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
        $this->assertGreaterThan($post->threadStarter->commentThread->id, $subThread_0->id);

    
    }
    
    public function testComments()
    {
        $comments = \App\Comment::all()->sortBy('id');
        $expected_comments = [
            [
                'body' => "hello nice story",
                'minor_title' => 'none',
                'comment_thread_id' => 1
            ],
            [
                'body' => "loved this, thanks",
                'minor_title' => 'none',
                'comment_thread_id' => 1
            ],
            [
                'body' => "Totally recognisable. Amirite?!",
                'minor_title' => 'none',
                'comment_thread_id' => 1
            ],
            [
                'body' => "hElLo nIcE St0rY..",
                'minor_title' => 'lol xd',
                'comment_thread_id' => 2
            ],
            [
                'body' => "You are man. Nostalgia. This brings tears to my eyes.",
                'minor_title' => 'none',
                'comment_thread_id' => 3
            ],       
        ];
        $lastCommentId = 0;
        $lastThreadId = 1;
        foreach($comments as $comment){
            $expected = array_shift($expected_comments);
            $this->assertEquals($expected['body'], $comment->body);
            $this->assertEquals($expected['minor_title'], $comment->minor_title);
            $this->assertEquals($expected['comment_thread_id'], $comment->comment_thread_id);
            $this->assertGreaterThan($lastCommentId, $comment->id);
            $this->assertLessThan($lastCommentId+2, $comment->id);
            $this->assertGreaterThanOrEqual($lastThreadId, $comment->comment_thread_id);
            $this->assertLessThanOrEqual($lastThreadId+1, $comment->comment_thread_id);
            $lastCommentId = $comment->id;
            $lastThreadId = $comment->comment_thread_id;
        }
        
    }
    public function testThreadStarters()
    {

        $thSt = \App\ThreadStarter::all();
        $this->assertInstanceOf(\Illuminate\Support\Collection::class, $thSt);
        $this->assertInstanceOf(\App\Post::class,$thSt->first()->replyable);
        
        $rest = $thSt->except(1)->pluck('replyable');
        $this->assertContainsOnlyInstancesOf(\App\Comment::class, $rest);
        
    }

    public function testCommentMorph()
    {
        $comment = \App\Comment::find(1);
        $threadStarter = $comment->threadStarter;

        $this->assertInstanceOf(\App\ThreadStarter::class, $threadStarter);
        $this->assertNotNull($threadStarter->commentThread);
        $this->assertInstanceOf(\App\CommentThread::class, $threadStarter->commentThread);

    }
    public function testPostMorph()
    {
        $this->assertTrue(true);
    }

    public function testReplyToThreadStarter()
    {
        $threadStarter = \App\ThreadStarter::find(1);
        $user = \App\User::find(8);
        $this->assertInstanceOf(\App\ThreadStarter::class, $threadStarter);
        $commentThread = $threadStarter->commentThread;
        $this->assertNotNull($commentThread);
        $this->assertInstanceOf(\App\CommentThread::class, $commentThread);
        $this->assertCount(3, $commentThread->replies);
        $comment = new \App\Comment(["minor_title"=>"test comment", "body"=>"this is a test comment"]);
        $comment->user()->associate($user);
        

        // $this->expectException(\Illuminate\Database\QueryException::class);
        // $comment->save();
        // $this->checkExceptionExpectations();
        $this->assertNull($comment->commentThread);
        $threadStarter->reply($comment);
        $commentThread->save();
        $comment->save();
        $this->assertInstanceOf(\App\CommentThread::class, $comment->commentThread);
        $this->assertNotNull($comment->commentThread);

        $this->assertCount(3, $commentThread->replies);
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
    public function testThreadStarterGetThread()
    {
        $this->assertTrue(true);
    }

    public function testGetCommentReplies()
    {
        $this->assertTrue(true);
    }
    public function testThreadStarterHasReplies()
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
