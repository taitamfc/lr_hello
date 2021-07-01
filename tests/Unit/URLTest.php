<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\URL;

class URLTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function testSluggifyReturnsSluggifiedString()
    {
        $originalString = 'This string will be sluggified';
        $expectedResult = 'this-string-will-be-sluggified';

        $url = new URL();
        $result = $url->sluggify($originalString);

        $this->assertEquals($expectedResult, $result);
    }
}
