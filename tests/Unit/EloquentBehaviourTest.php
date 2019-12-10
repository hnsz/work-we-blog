<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
/**
 * For my own understanding
 * @group laravel
 */
class EloquentBehaviourTest extends TestCase
{
    /**
    * This migration must contain foreign keys
    * And have foreign key constraints set to on
    *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
    }
    /**
     * You can get the Relation on a Model that is instantiated.
    */
    public function testGetRelationOnInstanceOnly()
    {
        $user = $this->user();
        $relation = $user->posts();
        $this->assertInstanceOf(\Illuminate\Database\Eloquent\Relations\HasMany::class, $relation);
    }
    /**
     * But if the Model isn't stored in database 
     * you can't call create on that relation
     */
    public function testCreateOnRelationOfInstanceOnly()
    {
        $user = $this->user();
        $relation = $user->posts();
        $this->expectException(\Illuminate\Database\QueryException::class);
        $this->expectExceptionCode(23000);
        $post = $relation->create(['title'=>'asdasd','body'=>'asdasdas']);
        $this->checkExceptionExpectations();
    }
    /**
     * Save the model and it's fine.
     */
    public function testCreateOnRelationAfterSave()
    {
        $user = $this->user();
        $relation = $user->posts();

        $user->save();
        
        $post = $relation->create(['title'=>'asdasd','body'=>'asdasdas']);
        $this->assertInstanceOf(\App\Post::class, $post);
        $this->assertEquals("asdasd", $post->title);
        $this->assertEquals("asdasdas", $post->body);
    }

    public function testSaveNullObjectOnInstanceOnly()
    {
        $user = $this->user();
        
        $replyable = new \App\Post(["title"=>"Anything that starts with too is bad.",
                                "body"=>"As the title said, discuss.."]);

        $nullObject = $replyable->threadStarter;

        $m = "Should return default null object";
        $this->assertNotNull($nullObject,$m);

        $this->assertFalse($replyable->wasRecentlyCreated);
        $this->assertFalse($nullObject->wasRecentlyCreated);

        $starter = $replyable->threadStarter;
        $m = "Second access to property should give same object as null object";
        $this->assertSame($nullObject,$starter);
        // $user->posts()->save($replyablePost);

        /** Verifying the behaviour is what I think */
        $m = "After changes are made, it should still be the same object as the null object.";
        $this->assertSame($nullObject,$starter, $m);
        $starter2 = $replyable->threadStarter;
        $this->assertSame($nullObject,$starter2, $m);
        
                
        
                
        


    }
    /**
     * @return \App\User
     * The Provider that Provides the User 
     */
    public function user(): \App\User
    {
        $user = new \App\User(["name"=>"asd","email"=>"asd@asd.nl","password"=>"asd"]);
        return $user;
    }    
}
