<?php

namespace Tests\Unit;

use App\Http\Controllers\ReplyableController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @group request
 */
class CommentReplyRequestTest extends TestCase
{


    protected function setUp(): void
    {
        parent::setUp();

    }

    public function testRequestProvider()
    {
        $this->assertTrue(true);
        $data = [ 
            ['title' => "OP sucks",
             'body'=>"This is the most ill-informed story I have ever read. what is this website coming to.",
            ],
        ];
        $headers = ["Content-type" => "application/json"];
        $this->post("/comment",$data, $headers);

        return new ReplyableController();
    }
    /**
     * @depends testRequestProvider
     *
     * @return void
     */
    public function testRequest(ReplyableController $replyableController)
    {

        
        dd($replyableController);

    }
}
