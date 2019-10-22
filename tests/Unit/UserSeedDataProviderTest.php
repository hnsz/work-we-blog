<?php

namespace Tests\Unit;

use \App\SeedDataProvider\UserSeedDataProvider;
use Tests\TestCase;

/**
 * @group dataprovider
 * @group userseeder
  */
class UserSeedDataProviderTest extends TestCase
{
    /**
     * 
     */
    public function setUp(): void
    {
        parent::setUp();
        echo "Setup Test";
        
    }
    public function testInstantiate()
    {
        $datProv = Null;
        $this->assertNull($datProv);
        $datProv = new \App\SeedDataProvider\UserSeedDataProvider();
        $this->assertNotNull($datProv);
    }


}
