<?php

namespace Tests\Unit;


use Illuminate\Foundation\Testing\DatabaseMigrations;

use Tests\TestCase;
use Faker\Factory;

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
        $class = \App\SeedDataProviders\UserSeedDataProvider::class;
        $this->assertTrue(class_exists($class),  "{$class} not loaded.");

        $datProv = new \App\SeedDataProviders\UserSeedDataProvider(\Faker\Factory::create());
        $this->assertNotNull($datProv);

        return $datProv;
    }
    /**
     * @depends testInstantiate
     */
    public function testOutput($datProv)
    {
        $data = $datProv->get();
        
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

        $this->assertTrue($fieldNamesOk);
                
    }
    /**
     * @depends testOutput
     */
    public function testSimilarity()
    {
        // print_r($data);
        $datProv = new \App\SeedDataProviders\UserSeedDataProvider(\Faker\Factory::create());
        $output = $datProv->get();
        $json = json_encode($output);
        $hash = \Hash::make($json);
        echo "\n";
        var_dump($hash);

        $this->assertTrue(true);
    }


}
