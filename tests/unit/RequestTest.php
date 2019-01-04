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

    /**
     * @var string
     */
    private $stream_handle = __DIR__ . "/../resources/sources/put_request_examples.txt";

    protected function setUp()
    {
        $_GET       = [];
        $_POST      = [];
        $_COOKIE    = [];

        $_SERVER['REQUEST_METHOD']      = '';
        $_SERVER['HTTP_CONTENT_TYPE']   = '';
    }

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

    public function testCheckExistCookie()
    {
        $this->assertFalse(Request::checkExistCookie());

        $this->assertFalse(Request::checkExistCookie('one'));

        $_COOKIE = $this->example_data;

        $this->assertTrue(Request::checkExistCookie());

        $this->assertTrue(Request::checkExistCookie('two'));
    }

    public function testGetAllFromCookie()
    {
        $this->assertEquals([], Request::getAllFromCookie());

        $_COOKIE = $this->example_data;

        $this->assertEquals($this->example_data, Request::getAllFromCookie());
    }

    public function testGetIntFromCookie()
    {
        $this->assertFalse(Request::getIntFromCookie('one'));

        $this->assertEquals(3, Request::getIntFromCookie('three', 3));

        $_COOKIE = $this->example_data;

        $this->assertEquals(2, Request::getIntFromCookie('two'));

        $this->assertFalse(Request::getIntFromCookie('zero'));
    }

    public function testGetFloatFromCookie()
    {
        $this->assertFalse(Request::getFloatFromCookie('one'));

        $this->assertEquals(2.2, Request::getFloatFromCookie('two', 2.2));

        $_COOKIE = $this->example_data;

        $this->assertEquals(2.0, Request::getFloatFromCookie('two'));

        $this->assertEquals(5.5, Request::getFloatFromCookie('five'));

        $this->assertFalse(Request::getFloatFromCookie('zero'));
    }

    public function testGetStringFromCookie()
    {
        $this->assertFalse(Request::getStringFromCookie('one'));

        $this->assertEquals('two', Request::getStringFromCookie('two', 'two'));

        $_COOKIE = $this->example_data;

        $this->assertEquals('5.5', Request::getStringFromCookie('five'));

        $this->assertEquals('2', Request::getStringFromCookie('two'));
    }

    public function testGetArrayFromCookie()
    {
        $this->assertFalse(Request::getArrayFromCookie('one'));

        $this->assertEquals(['two' => 2], Request::getArrayFromPut('two', ['two' => 2]));

        $_COOKIE = $this->example_data;

        $this->assertEquals([3], Request::getArrayFromCookie('three'));

        $this->assertEquals([5.5], Request::getArrayFromCookie('five'));

        $this->assertFalse(Request::getArrayFromCookie('zero'));
    }

    public function testGetRawFromCookie()
    {
        $this->assertFalse(Request::getRawFromCookie('one'));

        $this->assertEquals(['two' => 2], Request::getRawFromCookie('two', ['two' => 2]));

        $_COOKIE = $this->example_data;

        $this->assertEquals(1, Request::getRawFromCookie('one'));

        $this->assertEquals('2', Request::getRawFromCookie('two'));

        $this->assertEquals([3], Request::getRawFromCookie('three'));

        $this->assertEquals(5.5, Request::getRawFromCookie('five'));

        $this->assertTrue(Request::getRawFromCookie('six'));

        $this->assertEquals(null, Request::getRawFromCookie('seven'));

        $this->assertFalse(Request::getRawFromCookie('zero'));
    }

    public function testCheckExistPut()
    {
        $this->assertFalse(Request::checkExistPut());

        $_SERVER['HTTP_CONTENT_TYPE'] = 'application/json';

        $this->assertTrue(Request::checkExistPut());
    }

    public function testGetAllFromPut()
    {
        $this->assertEquals([], Request::getAllFromPut());

        $request = new Request();
        $request->setStreamHandle($this->stream_handle);

        $this->assertEquals($this->example_data, $request::getAllFromPut());

        $request->setStreamHandle('php://input');
    }

    public function testGetIntFromPut()
    {
        $this->assertFalse(Request::getIntFromPut('one'));

        $this->assertEquals(3, Request::getIntFromPut('three', 3));

        $request = new Request();
        $request->setStreamHandle($this->stream_handle);

        $this->assertEquals(2, $request::getIntFromPut('two'));

        $this->assertFalse($request::getIntFromPut('zero'));

        $request->setStreamHandle('php://input');
    }

    public function testGetFloatFromPut()
    {
        $this->assertFalse(Request::getFloatFromPut('one'));

        $this->assertEquals(2.2, Request::getFloatFromPut('two', 2.2));

        $request = new Request();
        $request->setStreamHandle($this->stream_handle);

        $this->assertEquals(2.0, $request::getFloatFromPut('two'));

        $this->assertEquals(5.5, $request::getFloatFromPut('five'));

        $this->assertFalse($request::getFloatFromPut('zero'));

        $request->setStreamHandle('php://input');
    }

    public function testGetStringFromPut()
    {
        $this->assertFalse(Request::getStringFromPut('one'));

        $this->assertEquals('two', Request::getStringFromPut('two', 'two'));

        $request = new Request();
        $request->setStreamHandle($this->stream_handle);

        $this->assertEquals('5.5', $request::getStringFromPut('five'));

        $this->assertEquals('2', $request::getStringFromPut('two'));

        $this->assertFalse($request::getStringFromPut('zero'));

        $request->setStreamHandle('php://input');
    }

    public function testGetArrayFromPut()
    {
        $this->assertFalse(Request::getArrayFromPut('one'));

        $this->assertEquals(['two' => 2], Request::getArrayFromPut('two', ['two' => 2]));

        $request = new Request();
        $request->setStreamHandle($this->stream_handle);

        $this->assertEquals([3], $request::getArrayFromPut('three'));

        $this->assertEquals([5.5], $request::getArrayFromPut('five'));

        $this->assertFalse($request::getArrayFromPut('zero'));

        $request->setStreamHandle('php://input');
    }

    public function testGetRawFromPut()
    {
        $this->assertFalse(Request::getRawFromPut('one'));

        $this->assertEquals(['two' => 2], Request::getRawFromPut('two', ['two' => 2]));

        $request = new Request();
        $request->setStreamHandle($this->stream_handle);

        $this->assertEquals(1, $request::getRawFromPut('one'));

        $this->assertEquals('2', $request::getRawFromPut('two'));

        $this->assertEquals([3], $request::getRawFromPut('three'));

        $this->assertEquals(5.5, $request::getRawFromPut('five'));

        $this->assertTrue($request::getRawFromPut('six'));

        $this->assertEquals(null, $request::getRawFromPut('seven'));

        $this->assertFalse($request::getRawFromPut('zero'));

        $request->setStreamHandle('php://input');
    }
}
