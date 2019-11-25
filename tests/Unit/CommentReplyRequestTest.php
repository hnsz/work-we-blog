<?php

namespace Tests\Unit;

use App\Http\Controllers\ReplyableController;
use App\Http\Requests\CommentReply;
use Tests\TestCase;
// use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestResponse;


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
        /*
        
        \DB::table('users')->insert([
                'name' => 'hns',
                'email' => 'hansrudolfw@gmail.com',
                'password' => \Hash::make('welkom01'),
                'created_at' => \Carbon\Carbon::now()
            ]);
        */

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
        $req = $this->app->get_defined_vars();

    }
    /**
     *
     * @return void
     */
    public function testCommentCreate()
    {

        $user = new \App\User(['email' => 'hansrudolfw@gmail.com', 'password' => 'welkom01']);
        \Auth::login($user);
        
        $this->assertInstanceOf(\App\User::class, $user);
        $this->assertTrue(\Auth::check());
        

        
    }

}
