<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Arr;
/**
 * @group personal
 */
class HelperFunctionsTest extends TestCase
{
    const arr3d = [
        [
                ['p', 'q', 'r'], 
                ['u', 'v', 'w'],
                ['x', 'y', 'z']
        ],
        [
                [1, 2, 3], 
                [4, 5, 6],
                [7, 8, 9]
        ],
        [
                ['I', 'II', 'III'],
                ['IV', 'V', 'VI'],
                ['VII', 'VIII', 'IX']
        ]
        ];
    const map2d = [
            'x' =>
                ['I' => 'a',
                 'II' => 'b',
                 'III'=> 'c'],
            'y' =>
                ['d' => 4,
                 'e' => 5,
                 'f' => 6],
            'z' =>  ['VII', 'VIII', 'IX']
    ];
         
    
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testArrCollapse()
    {
        $arr3d = self::arr3d;
        $arr2d = Arr::collapse($arr3d);
        $arr1d = Arr::collapse($arr2d);
        $arr0d = Arr::collapse($arr1d);
        

        $this->assertCount(3, $arr3d);
        $this->assertCount(9, $arr2d);
        $this->assertCount(27, $arr1d);
        $this->assertCount(0, $arr0d);
    }
    public function testArrDot()
    {
        $map2d = self::map2d;
        $dot = Arr::dot($map2d);
        // print_r($dot);
        $this->assertTrue(true);
    }
    public function testArrFirst()
    {
        $result = Arr::first(self::map2d, fn($v,$k) => in_array('VII', $v));
        // print_r($result);
        $this->assertTrue(true);
    }
    public function testArrFlatten()
    {
        $result = Arr::flatten(self::map2d);
        $result2 = Arr::flatten(self::arr3d);
        // print_r($result);
        // print_r($result2);
        $this->assertTrue(true);
    }
    public function testArrForget()
    {
        $arr = self::arr3d;
        Arr::forget($arr, '2.0.1');
        // print_r($arr);
        $this->assertTrue(true);
    }
    public function testArrGet()
    {
        $arr = self::arr3d;
        $actual = Arr::get($arr, '2.0.1');
        $this->assertEquals('II', $actual);
        $actualDefault = Arr::get($arr, '2.0.3', "XIV");
        $this->assertEquals('XIV', $actualDefault);
    }
    public function testHas()
    {
        $arr = self::arr3d;
        $actualHas = Arr::has($arr, '2.0.1');
        $actualHasNot = Arr::has($arr, '2.0.3');
        $this->assertTrue($actualHas);
        $this->assertFalse($actualHasNot);
    }
    public function testArrLastCallbackDefault()
    {
        $this->assertTrue(true);

    }
}
