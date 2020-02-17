<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

/**
 * @group personal
 */
class PhpLambdaInLambdaTest extends TestCase
{

    const inputNames  = ["janis", "louise", "kenneth", "gijsbrecht"];
    const expected  = ["JANIS", "LOUISE", "KENNETH", "GIJSBRECHT"];
    /**
     * @return void
     */
    public function testSanity()
    {
        $this->assertNotEqualsCanonicalizing(self::expected, self::inputNames);
        $actual = array_map('strtoupper', self::inputNames);
        $this->assertNotEqualsCanonicalizing(self::inputNames, $actual);
        $this->assertEqualsCanonicalizing(self::expected, $actual);
    }
    public function testLambda()
    {
        $actual = array_map(fn ($name) => strtoupper($name),  self::inputNames);
        $this->assertEqualsCanonicalizing(self::expected, $actual);
    }
    public function testLambdaInLambda()
    {
        Collection::macro('toUpper', fn () => $this->map(fn($name) => Str::upper($name)));

        $collection = collect(self::inputNames);
        $upper = $collection->toUpper();
        $actual = $upper->toArray();

        $this->assertEqualsCanonicalizing(self::expected, $actual);
    }
}
