<?php

namespace Tests\Unit;

use App\Http\Controllers\ReplyableController;
use App\Http\Requests\CommentReply;
use Tests\TestCase;
// use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\Concerns\InteractsWithContainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Mockery;

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
        $responseObject = $this->post("/posts/1/reply/",$data);
        

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
        
        
        // $a =  new Request(  $query=[], 
        //                     $request=[],
        //                     $attributes=[],
        //                     $cookies = [],
        //                     $files = [],
        //                     $server = [],
        //                     $content = "GIMME DEM DUKATS FOOL!"
        //                 );
        
        
                $data = [ 
                    ['title' => "OP sucks",
                     'body'=>"This is the most ill-informed story I have ever read. what is this website coming to.",
                    ],
                ];
                $headers = ["Content-type" => "text/plain"];
        //         $responseObject = $this->post("/posts/1/reply/",$data, $headers);
        // $commentReply = $this->mock(\App\Http\Requests\CommentReply::class);
        /**
         * this->instance(ServiceName::class, Mockery::mock(ServiceName::class, function($mock){
         *              $mock->makePartial()->shouldReceive('methodName')->once()->andReturn(result)
         * }))
         */

        $commentReply =  Mockery::mock(\App\Http\Requests\CommentReply::class, function($mock) {
            $mock->makePartial();
            $mock->shouldReceive('get')->with('title')->andReturn('OP sucks');

        });
        //$replyableCtrl =  new \App\Http\Controllers\ReplyableController($commentReply, \App\Post::find(1) );


        $getTitle = $commentReply->get('title');
        // Facade Mockery roept aan? 

        // Trace :
        // Error: __clone method called on non-object

        // vendor/symfony/http-foundation/Request.php:483
        // vendor/symfony/var-dumper/Caster/SymfonyCaster.php:39
        // vendor/symfony/var-dumper/Cloner/AbstractCloner.php:329
        // vendor/symfony/var-dumper/Cloner/VarCloner.php:189
        // vendor/symfony/var-dumper/Cloner/AbstractCloner.php:262
        // vendor/beyondcode/laravel-dump-server/src/Dumper.php:39
        // vendor/beyondcode/laravel-dump-server/src/DumpServerServiceProvider.php:53
        // vendor/symfony/var-dumper/VarDumper.php:50
        // vendor/symfony/var-dumper/Resources/functions/dump.php:38
        // tests/Unit/CommentReplyRequestTest.php:99
        dd($getTitle);
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


