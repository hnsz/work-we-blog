<?php

namespace Tests\Unit;

use App\Http\Controllers\ReplyableController;
use App\Http\Requests\CommentReply;
use Tests\TestCase;
// use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\Concerns\InteractsWithContainer;
use Illuminate\Support\Facades\Auth;
/**
 * @group request
 */
class CommentReplyRequestTest extends TestCase
{


    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->seed();
    }

    public function testHttpResponse()
    {
        
        $data = [ 
            ['title' => "OP sucks",
             'body'=>"This is the most ill-informed story I have ever read. what is this website coming to.",
            ],
        ];
        $headers = ["Content-type" => "text/plain"];
        $responseObject = $this->post("/posts/1/reply/",$data, $headers);


        $this->assertInstanceOf(TestResponse::class, $responseObject);
        $responseObject->assertSuccessful();
        $responseObject->assertHeader('x-accept-message');
        $responseObject->assertHeaderMissing('x-reject-message');
        $responseObject->assertStatus(202);
        

    }
    /**
     *
     * @return void
     */
    public function testCommentCreate()
    {

        $user = new \App\User(['email' => 'hansrudolfw@gmail.com', 'password' => 'welkom01']);
        
        Auth::login($user);
        
        $this->assertInstanceOf(\App\User::class, $user);
        $this->assertTrue(Auth::check());
    }
    /**
     * 
     *
     * @return void
     */
    public function testUcCommentReply()
    {
        $replyctrl = \App\Http\Controllers\ReplyableController::class;
        $insta = new \App\Http\Controllers\ReplyableController();
        $this->instance($replyctrl, $insta);

        $replyableCtrl = $this->mock($replyctrl);
        
        

        $this->assertNotNull($replyableCtrl);
        $this->assertInstanceOf($replyctrl, $replyableCtrl);

    }
}


