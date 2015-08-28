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

        static::assertTrue($result->isSuccess());
        static::assertTrue($result->getStatus());
        static::assertNull($result->getMessage());
        static::assertNull($result->getData());

        $result = new Result(false, 'test');

        static::assertFalse($result->isSuccess());
        static::assertFalse($result->getStatus());
        static::assertSame('test', $result->getMessage());

        $result->setStatus(1);

        static::assertTrue($result->isSuccess());
        static::assertTrue($result->getStatus());

        $result->setMessage('fail');

        static::assertSame('fail', $result->getMessage());

        $result = new Result(true, 'success', [ 'example' => true ]);
        static::assertSame([ 'example' => true ], $result->getData());

        $result->setData([ 'example' => false ]);
        static::assertSame([ 'example' => false ], $result->getData());

        static::assertSame(false, $result->getData('example'));
        static::assertSame(null, $result->getData('exampleUnknow'));
        static::assertSame('alternativeReturn', $result->getData('exampleUnknow', 'alternativeReturn'));
    }
}
