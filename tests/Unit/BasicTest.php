<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

class BasicTest extends TestCase
{
    public function testSluggifyReturnsSluggifiedString()
    {
        $originalString = 'This string will be sluggified';
        $expectedResult = 'this-string-will-be-sluggified';
    }
    
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        
        $user = new User;
        //$this->assertEmpty(User::class, $user);
         $this->assertTrue(true);
    }

    public function testFalseIsFalse()
    {
        $foo = false;
        $this->assertFalse($foo);
    }

    public function testTrueIsTrue()
    {
        $foo = false;
        $this->assertTrue($foo);
    }
}
