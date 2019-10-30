<?php

namespace Tests\Unit;


use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;
use Faker\Factory;
use Hamcrest\Matcher;
use Hamcrest\Matchers;
use Illuminate\Contracts\Cache;

/**
 * @group dataprovider
 * @group userseeder
  */
class UserSeedDataProviderTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * 
     */
    public function classUTGetInstance($rngSeed=null)
    {
       return new \App\SeedDataProviders\UserSeedDataProvider(\Faker\Factory::create(), $rngSeed);
    }
    public function classUTClassName()
    {
        return \App\SeedDataProviders\UserSeedDataProvider::class;
    }
    public function setUp(): void
    {
        parent::setUp();
        $this->artisan("migrate:fresh");
        /**
         * Dont call it, you're testing it.
         *  $this->seed();
         **/
        
    }
    public function testInstantiate()
    {
        $class = $this->classUTClassName();
        $this->assertTrue(class_exists($class),  "{$class} not loaded.");

        $dataProv = $this->classUTGetInstance();
        $this->assertNotNull($dataProv);
        return $dataProv;
    }
    /**
     * @depends testInstantiate
     */
    public function testOutput($dataProv)
    {
        $data = $dataProv->get();
        
        $this->assertIsArray($data);
        $this->assertCount(10,$data);
        $this->assertEquals(range(0,9), array_keys($data));



        $fieldNamesOk = array_reduce(  $data, 
            function ($carry, $row) {
                $keys = array_keys($row);
                $expected = ['name', 'email', 'password', 'created_at'];
                $thatShouldBeThere = array_intersect($keys, $expected);
                $thatShouldntBeThere  = array_diff($keys, $expected);

                if(count($thatShouldBeThere) !== count($expected) 
                      || count($thatShouldntBeThere) > 0) {
                    return False;
                }
                else {
                    return $carry;
                }
            },
            true
        );
        $json = $dataProv->json();
        $this->assertJson($json);
        $this->assertCount(count($data), json_decode($json));
        


        $this->assertTrue($fieldNamesOk);
    }
    public function testCallGetTwiceSameData()
    {
        $dataProv = $this->classUTGetInstance();
        $dataCall1 = $dataProv->get();
        
        $dataCall2 = $dataProv->get();

        $this->assertEqualsCanonicalizing($dataCall1,$dataCall2);

    }
     /**
     * @depends testOutput
     */
    public function testFixedRandomSeed()
    {
        $rngSeed = base64_encode(random_bytes(10));
        echo "\n";
        print_r($rngSeed);
        

        
        $dataI1 = $this->classUTGetInstance($rngSeed)->get();
        $dataI2 = $this->classUTGetInstance($rngSeed)->get();
        $this->assertEquals($dataI1, $dataI2);


        $slightlyDifferentRngSeed = substr($rngSeed, 0, strlen($rngSeed) - 1);
        
        $this->assertNotEquals($rngSeed, $slightlyDifferentRngSeed);
        $dataI3 = $this->classUTGetInstance($slightlyDifferentRngSeed)->json();
        $this->assertNotEquals($dataI1, $dataI3);
        
        $this->assertTrue(true);
    }
    public function testFileStore()
    {
        $SeedProv = $this->classUTClassName(Cache\Factory('FileStore'));
        $SeedProv::withCache( FileStore() );

    }
}
 