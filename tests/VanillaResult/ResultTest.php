<?php

namespace Rentalhost\VanillaResult;

use PHPUnit_Framework_TestCase;

class ResultTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test basic methods.
     * @covers Rentalhost\VanillaResult\Result::__construct
     * @covers Rentalhost\VanillaResult\Result::isSuccess
     * @covers Rentalhost\VanillaResult\Result::getStatus
     * @covers Rentalhost\VanillaResult\Result::setStatus
     * @covers Rentalhost\VanillaResult\Result::getMessage
     * @covers Rentalhost\VanillaResult\Result::setMessage
     * @covers Rentalhost\VanillaResult\Result::getData
     * @covers Rentalhost\VanillaResult\Result::setData
     */
    public function testBasic()
    {
        $result = new Result;

        $this->assertTrue($result->isSuccess());
        $this->assertTrue($result->getStatus());
        $this->assertNull($result->getMessage());
        $this->assertNull($result->getData());

        $result = new Result(false, "test");

        $this->assertFalse($result->isSuccess());
        $this->assertFalse($result->getStatus());
        $this->assertSame("test", $result->getMessage());

        $result->setStatus(1);

        $this->assertTrue($result->isSuccess());
        $this->assertTrue($result->getStatus());

        $result->setMessage("fail");

        $this->assertSame("fail", $result->getMessage());

        $result = new Result(true, "success", [ "example" => true ]);
        $this->assertSame([ "example" => true ], $result->getData());

        $result->setData([ "example" => false ]);
        $this->assertSame([ "example" => false ], $result->getData());

        $this->assertSame(false, $result->getData("example"));
        $this->assertSame(null, $result->getData("exampleUnknow"));
        $this->assertSame("alternativeReturn", $result->getData("exampleUnknow", "alternativeReturn"));
    }
}
