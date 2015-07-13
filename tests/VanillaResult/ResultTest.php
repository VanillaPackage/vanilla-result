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
     */
    public function testBasic()
    {
        $result = new Result;

        $this->assertTrue($result->isSuccess());
        $this->assertTrue($result->getStatus());
        $this->assertNull($result->getMessage());

        $result = new Result(false, "test");

        $this->assertFalse($result->isSuccess());
        $this->assertFalse($result->getStatus());
        $this->assertSame("test", $result->getMessage());

        $result->setStatus(1);

        $this->assertTrue($result->isSuccess());
        $this->assertTrue($result->getStatus());

        $result->setMessage("fail");

        $this->assertSame("fail", $result->getMessage());
    }
}
