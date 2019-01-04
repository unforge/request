<?php

namespace Unforge\Toolkit;

/**
 * Class RequestTest
 * @package Unforge\Toolkit
 */
class RequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    private $example_data = [
        'one'   => 1,
        'two'   => '2',
        'three' => [3],
        'four'  => [4, 4],
        'five'  => 5.5,
        'six'   => true,
        'seven' => null,
    ];

    protected function setUp()
    {
        $_GET  = [];
        $_POST = [];
        $_SERVER['REQUEST_METHOD'] = '';
        $_SERVER['HTTP_CONTENT_TYPE'] = '';
    }

    /**
     * @var string
     */
    protected static $stream_handle = 'php://input';

    public function testCheckExistPost()
    {
        $this->assertFalse(Request::checkExistPost());

        $_SERVER['REQUEST_METHOD'] = 'POST';

        $this->assertTrue(Request::checkExistPost());
    }

    public function testGetAllFromPost()
    {
        $this->assertEquals([], Request::getAllFromPost());

        $_POST = $this->example_data;

        $this->assertEquals($this->example_data, Request::getAllFromPost());
    }

    public function testGetIntFromPost()
    {
        $this->assertFalse(Request::getIntFromPost('one'));

        $this->assertEquals(3, Request::getIntFromPost('three', 3));

        $_POST = $this->example_data;

        $this->assertEquals(2, Request::getIntFromPost('two'));

        $this->assertFalse(Request::getIntFromPost('zero'));
    }

    public function testGetFloatFromPost()
    {
        $this->assertFalse(Request::getFloatFromPost('one'));

        $this->assertEquals(2.2, Request::getFloatFromPost('two', 2.2));

        $_POST = $this->example_data;

        $this->assertEquals(2.0, Request::getFloatFromPost('two'));

        $this->assertEquals(5.5, Request::getFloatFromPost('five'));

        $this->assertFalse(Request::getFloatFromPost('zero'));
    }

    public function testGetStringFromPost()
    {
        $this->assertFalse(Request::getStringFromPost('one'));

        $this->assertEquals('two', Request::getStringFromPost('two', 'two'));

        $_POST = $this->example_data;

        $this->assertEquals('5.5', Request::getStringFromPost('five'));

        $this->assertEquals('2', Request::getStringFromPost('two'));

        $this->assertFalse(Request::getStringFromPost('zero'));
    }

    public function testGetArrayFromPost()
    {
        $this->assertFalse(Request::getArrayFromPost('one'));

        $this->assertEquals(['two' => 2], Request::getArrayFromPost('two', ['two' => 2]));

        $_POST = $this->example_data;

        $this->assertEquals([3], Request::getArrayFromPost('three'));

        $this->assertEquals([5.5], Request::getArrayFromPost('five'));

        $this->assertFalse(Request::getArrayFromPost('zero'));
    }

    public function testGetRawFromPost()
    {
        $this->assertFalse(Request::getRawFromPost('one'));

        $this->assertEquals(['two' => 2], Request::getRawFromPost('two', ['two' => 2]));

        $_POST = $this->example_data;

        $this->assertEquals(1, Request::getRawFromPost('one'));

        $this->assertEquals('2', Request::getRawFromPost('two'));

        $this->assertEquals([3], Request::getRawFromPost('three'));

        $this->assertEquals(5.5, Request::getRawFromPost('five'));

        $this->assertTrue(Request::getRawFromPost('six'));

        $this->assertEquals(null, Request::getRawFromPost('seven'));

        $this->assertFalse(Request::getRawFromPost('zero'));
    }

    public function testCheckExistGet()
    {
        $this->assertFalse(Request::checkExistGet());

        $_SERVER['REQUEST_METHOD'] = 'GET';

        $this->assertTrue(Request::checkExistGet());
    }

    public function getAllFromGet()
    {
        $this->assertEquals([], Request::getAllFromGet());

        $_GET = $this->example_data;

        $this->assertEquals($this->example_data, Request::getAllFromGet());
    }

    public function testGetIntFromGet()
    {
        $this->assertFalse(Request::getIntFromGet('one'));

        $this->assertEquals(3, Request::getIntFromGet('three', 3));

        $_GET = $this->example_data;

        $this->assertEquals(2, Request::getIntFromGet('two'));

        $this->assertFalse(Request::getIntFromGet('zero'));
    }

    public function testGetFloatFromGet()
    {
        $this->assertFalse(Request::getFloatFromGet('one'));

        $this->assertEquals(2.2, Request::getFloatFromGet('two', 2.2));

        $_GET = $this->example_data;

        $this->assertEquals(2.0, Request::getFloatFromGet('two'));

        $this->assertEquals(5.5, Request::getFloatFromGet('five'));

        $this->assertFalse(Request::getFloatFromGet('zero'));
    }

    public function testGetStringFromGet()
    {
        $this->assertFalse(Request::getStringFromGet('one'));

        $this->assertEquals('two', Request::getStringFromGet('two', 'two'));

        $_GET = $this->example_data;

        $this->assertEquals('5.5', Request::getStringFromGet('five'));

        $this->assertEquals('2', Request::getStringFromGet('two'));

        $this->assertFalse(Request::getStringFromGet('zero'));
    }

    public function testGetArrayFromGet()
    {
        $this->assertFalse(Request::getArrayFromGet('one'));

        $this->assertEquals(['two' => 2], Request::getArrayFromGet('two', ['two' => 2]));

        $_GET = $this->example_data;

        $this->assertEquals([3], Request::getArrayFromGet('three'));

        $this->assertEquals([5.5], Request::getArrayFromGet('five'));

        $this->assertFalse(Request::getArrayFromGet('zero'));
    }

    public function testGetRawFromGet()
    {
        $this->assertFalse(Request::getRawFromGet('one'));

        $this->assertEquals(['two' => 2], Request::getRawFromGet('two', ['two' => 2]));

        $_GET = $this->example_data;

        $this->assertEquals(1, Request::getRawFromGet('one'));

        $this->assertEquals('2', Request::getRawFromGet('two'));

        $this->assertEquals([3], Request::getRawFromGet('three'));

        $this->assertEquals(5.5, Request::getRawFromGet('five'));

        $this->assertTrue(Request::getRawFromGet('six'));

        $this->assertEquals(null, Request::getRawFromGet('seven'));

        $this->assertFalse(Request::getRawFromGet('zero'));
    }

    public function testCheckExistRequest()
    {
        // todo
    }

    public function testGetAllFromRequest()
    {
        // todo
    }

    public function testGetIntFromRequest()
    {
        // todo
    }

    public function testGetFloatFromRequest()
    {
        // todo
    }

    public function testGetStringFromRequest()
    {
        // todo
    }

    public function testGetArrayFromRequest()
    {
        // todo
    }

    public function testGetRawFromRequest()
    {
        // todo
    }

    public function testCheckExistsCookie()
    {
        // todo
    }

    public function testGetAllFromCookie()
    {
        // todo
    }

    public function testGetIntFromCookie()
    {
        // todo
    }

    public function testGetFloatFromCookie()
    {
        // todo
    }

    public function testGetStringFromCookie()
    {
        // todo
    }

    public function testGetArrayFromCookie()
    {
        // todo
    }

    public function testGetRawFromCookie()
    {
        // todo
    }

    public function testCheckExistPut()
    {
        // todo
    }

    public function testGetAllFromPut()
    {
        // todo
    }

    public function testGetIntFromPut()
    {
        // todo
    }

    public function testGetFloatFromPut()
    {
        // todo
    }

    public function testGetStringFromPut()
    {
        // todo
    }

    public function testGetArrayFromPut()
    {
        // todo
    }

    public function testGetRawFromPut()
    {
        // todo
    }
}
